<?php

namespace Siad\Http\Controllers\CV2017;

use Illuminate\Http\Request;
use Siad\CV2017\Athlete;
use Siad\CV2017\Inscription;
use Siad\Http\Controllers\Controller;

class FichaController extends Controller
{
    public function index()
    {
        return view('cv2017.ficha');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, $id)
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
}
