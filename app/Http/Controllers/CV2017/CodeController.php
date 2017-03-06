<?php

namespace Siad\Http\Controllers\CV2017;

use Illuminate\Http\Request;
use Siad\CV2017\Codes;
use Siad\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function index()
    {
        $data = Codes::all();

        return view('cv2017.code', compact('data'));
    }

    public function printCode() {
        $data = Codes::select('codes')
            ->get();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('cv2017.layout-print.code', compact('data'));
        return $pdf->stream();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $data = Codes::where('codes', '=', $id)
            ->select('codes', 'status')
            ->get();

        return [
            "code" => $data
        ];
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
