<?php

namespace Siad\Http\Controllers\CV2017;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Siad\Sport;
use Siad\CV2017\Venta;
use Siad\CV2017\Inscription;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Siad\Http\Controllers\Controller;

class VentaController extends Controller
{
    // Load info form sale
    public function loadInfoPaid($id) {
        return Inscription::with('product')
            ->where('id', '=', $id)
            ->get();
    }

    public function index()
    {
        $total_sale = Venta::totalsale();
        $today_sale = Venta::todaysale();
        $sports = Sport::pluck('name', 'id')->toArray();
        $data = Venta::with('inscription', 'inscription.product', 'inscription.athlete', 'inscription.athlete.agent', 'inscription.user')
            ->get();
        
        return view('cv2017.report.ventas', compact('data', 'sports', 'today_sale', 'total_sale'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        $venta = Venta::create([
            'inscription_id' => $request->get('inscription_id'),
            'price' => $request->get('paidtotal'),
            'user_id' => $user->id
        ]);

        $inscription = Inscription::find($request->get('inscription_id'));
        $inscription->status = '3';
        $inscription->save();

        return [
            'success' => true,
            'message' => 'Pago realizado con exito, por favor imprima el Recibo de Caja.',
            'venta' => $venta
        ];
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    // Metodo para imprimir el recibo de caja
    public function getPrint($id)
    {
        $data = Venta::with('inscription', 'user', 'inscription.athlete.agent', 'inscription.product')
            ->where('id', '=', $id)
            ->get();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('cv2017.layout-print.comprovante-pago', compact('data'));
        return $pdf->stream();
    }

    // Reporte por rango de fecha de ventas
    public function getPrintReportSale(Request $request) {
        $sd = explode('/', $request->get('startdate'));
        $startdate = Carbon::createFromDate($sd[2], $sd[1], $sd[0])->format('Y-m-d');
        $fd = explode('/', $request->get('finishdate'));
        $finishdate = Carbon::createFromDate($fd[2], $fd[1], $fd[0])->format('Y-m-d');
//        $ventas = Venta::with('inscription', 'inscription.product', 'inscription.athlete', 'inscription.athlete.agent')
//            ->whereBetween('created_at', [$startdate, $finishdate])
//            ->when($request->get('sport') != "", function ($query) use ($request){
//                return $query->where('Product.sport_id', $request->get('sport'));
//            })
//            ->get();

//        $ventas = DB::table('cv17_ventas')
//            ->join('cv17_inscriptions', 'cv17_ventas.inscription_id', '=', 'cv17_inscriptions.id')
//            ->whereBetween('cv17_ventas.created_at', [$startdate, $finishdate])
//            ->when($request->get('sport') != "", function ($query) use ($request){
//                return $query->where('cv17_products.sport_id', $request->get('sport'));
//            })
//            ->get();

        return compact('startdate', 'finishdate');
    }

}
