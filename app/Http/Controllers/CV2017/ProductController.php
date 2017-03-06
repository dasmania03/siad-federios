<?php

namespace Siad\Http\Controllers\CV2017;

use Illuminate\Http\Request;
use Siad\CV2017\Product;
use Siad\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        return view('cv2017.products');
    }

    public function create()
    {
        return view('cv2017.partials.product-new');
    }

    public function store(Request $request)
    {
        //
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

    // Metodo para llenar el DataTable
    public function load(Request $request) {
        if ($request->ajax()){
            return Product::with('sport')->get();
        }
        return false;
    }

    // Llenar combo de horarios
    public function loadInfo(Request $request, $id)
    {
        if($request->ajax()){
            return Product::select('horarys', 'days', 'price')->where('id', $id)->get();
        }
        return false;
    }
}
