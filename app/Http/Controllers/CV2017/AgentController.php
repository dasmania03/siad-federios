<?php

namespace Siad\Http\Controllers\CV2017;

use Illuminate\Http\Request;
use Siad\CV2017\Agent;
use Siad\Http\Controllers\Controller;

class AgentController extends Controller
{
    public function index()
    {
        return view('cv2017.partials.agent-new');
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $agent = Agent::create([
                'identification' => $request->get('agent_modal_identification'),
                'first_name' => $request->get('agent_modal_fname'),
                'last_name' => $request->get('agent_modal_lname'),
                'full_name' => ($request->get('agent_modal_lname')." ".$request->get('agent_modal_fname')),
                'telephone' => $request->get('agent_modal_phone'),
                'email' => $request->get('agent_modal_email'),
            ]);
            return [
                'success' => true,
                'message' => 'Representante guardado con exito',
                'agent' => $agent->toArray()
            ];
        }
        return false;
    }
    
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            return Agent::where('identification', $id)->get();
        }
        return false;
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
}
