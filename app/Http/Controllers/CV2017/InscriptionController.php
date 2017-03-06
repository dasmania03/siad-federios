<?php

namespace Siad\Http\Controllers\CV2017;

use Siad\CV2017\Codes;
use Siad\CV2017\Venta;
use Siad\CV2017\Athlete;
use Siad\CV2017\Product;
use Illuminate\Http\Request;
use Siad\CV2017\Inscription;
use Illuminate\Support\Facades\Auth;
use Siad\Http\Controllers\Controller;

class InscriptionController extends Controller
{
    // Retorna la vista principal de inscripciones
    public function index()
    {
        $data = Athlete::with('agent', 'inscriptions')->get();
        $total_sale = Venta::totalsale();
        $today_sale = Venta::todaysale();

        return view('cv2017.inscripciones', compact('data' ,'total_sale', 'today_sale'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $inscription = Inscription::create([
            'athlete_id' => $request->get('athlete_id'),
            'product_id' => $request->get('disciplina'),
            'horario' => $request->get('horario'),
            'dias' => $request->get('days'),
            'discount' => $request->get('discount'),
            'paid_total' => $request->get('paid_total'),
            'observations' => $request->get('observations'),
            'code_exo' => $request->get('code_exo'),
            'status' => $request->get('type'),
            'user_id' => $user->id
        ]);

        if ($request->get('code_exo') != "") {
            Codes::where('codes', '=', $request->get('code_exo'))
                ->update(['status' => 1]);
        }
        
        return [
            'success' => true,
            'message' => 'Inscripción agregada exitosamente, por favor imprima la ficha de registro.',
            'inscription' => $inscription
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
        $inscription = Inscription::find($id);

        $inscription->status = $request->get('type');

        $inscription->save();
        
        return [
            'success' => true,
            'message' => 'Registro eliminado correctamente'
        ];
    }
    
    public function destroy($id)
    {
        //
    }

    public function loadUniqueInscription($id)
    {
        $data = Athlete::with('agent', 'inscriptions', 'user', 'inscriptions.product', 'inscriptions.user', 'inscriptions.product.sport')
            ->where('id', '=', $id)
            ->get();

        $prod = Product::where([
            ['age_min', '<=', $data[0]->age],
            ['age_max', '>=', $data[0]->age],
        ])->pluck('detail', 'id')
            ->toArray();

        return view('cv2017.partials.inscription-new', compact('data', 'prod'));

    }

    // Metodo para imprimir ficha de inscripcion
    public function getPrint($id)
    {
        $data = Inscription::with('athlete', 'athlete.agent', 'product', 'user')
            ->where('id', '=', $id)
            ->get();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('cv2017.layout-print.inscription', compact('data'));
        return $pdf->stream();
    }

    public function countInscription($athlete, $product) {
        $countInscription = Inscription::where('athlete_id', '=', $athlete)
            ->where('status', '!=', '5')
            ->count('id');

        $validInscription = Inscription::where('athlete_id', '=', $athlete)
            ->where('product_id', '=', $product)
            ->where('status', '!=', '5')
            ->count('id');

        return json_encode([
            'itotal' => $countInscription,
            'ivalid' => $validInscription
        ]);
    }
}
