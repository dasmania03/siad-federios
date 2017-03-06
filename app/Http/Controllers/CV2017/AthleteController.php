<?php

namespace Siad\Http\Controllers\CV2017;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Siad\CV2017\Athlete;
use Illuminate\Http\Request;
use Siad\Http\Controllers\Controller;

class AthleteController extends Controller
{
    // Verificar si la cedula de referencia existe
    public function findAthlete($identification) {
        $a = Athlete::where('identification', '=', $identification)->count();
        
        return json_encode([
            'find' => $a
        ]);
    }

    public function getUniform() {
        $athletes = Athlete::with(['inscriptions' => function($query) {
            $query->where('status', '=', 1)
                ->orWhere('status' , '=', 3)
                ->orWhere('status' , '=', 4);
        }, 'inscriptions.product', 'inscriptions.venta', 'inscriptions.product.sport', 'agent'])->get();

        return view('cv2017.report.uniform', compact('athletes'));
    }

    public function deliveryUniform($id) {
        $athlete = Athlete::find($id);

        $athlete->status_uniform = 'Si';

        $athlete->save();

        return [
            'success' => true
        ];
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {

            $user = Auth::user();
            $date = explode('/', $request->get('birthdate'));
            $age = Carbon::createFromDate($date[2],$date[1],$date[0])->age;
            $birtdate = $date[2]."-".$date[1]."-".$date[0];

            $athlete = Athlete::create([
                'identification' => $request->get('identification'),
                'first_name' => $request->get('fname'),
                'last_name' => $request->get('lname'),
                'full_name' => ($request->get('lname')." ".$request->get('fname')),
                'birth_date' => $birtdate,
                'age' => $age,
                'address' => $request->get('address'),
                'telephone' => $request->get('phone'),
                'email' => $request->get('email'),
                'size' => $request->get('size'),
                'gender' => $request->get('sex'),
                'type_disability' => $request->get('type_disability'),
                'agent_id' => $request->get('agent_id'),
                'user_id' => $user['id']
            ]);
            return [
                'success' => true,
                'message' => 'Deportista guardado con exito, puede realizar la inscripción',
                'agent' => $athlete->toArray()
            ];
        }
        return false;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $athlete = Athlete::with('agent')
            ->where('id', '=', $id)
            ->get();

        return view('cv2017.ficha', compact('athlete'));
    }

    public function update(Request $request, $id)
    {
        $date = explode('/', $request->get('birthdate'));
        $age = Carbon::createFromDate($date[2],$date[1],$date[0])->age;
        $birtdate = $date[2]."-".$date[1]."-".$date[0];

        $athlete = Athlete::find($id);

        $athlete->first_name = $request->get('fname');
        $athlete->last_name = $request->get('lname');
        $athlete->full_name = ($request->get('lname')." ".$request->get('fname'));
        $athlete->birth_date = $birtdate;
        $athlete->age = $age;
        $athlete->address = $request->get('address');
        $athlete->telephone = $request->get('phone');
        $athlete->email = $request->get('email');
        $athlete->size = $request->get('size');
        $athlete->gender = $request->get('sex');
        $athlete->type_disability = $request->get('type_disability');
        $athlete->agent_id = $request->get('agent_id');

        $athlete->save();

        return [
            'success' => true,
            'message' => 'Deportista actualizado con exito, puede realizar la inscripción'
        ];
    }

    public function destroy($id)
    {
        //
    }
}
