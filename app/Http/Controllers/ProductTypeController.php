<?php

namespace App\Http\Controllers;

use App\MilkProduct;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product_types')->paginate(5);
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cost' => ['required', 'string'],
            'image' =>['required', 'image'],
        ]);

        $filePath = $request['image']->store('uploads' , 'public');


        $product = ProductType::create([
            'name' => $request['name'],
            'cost' => $request['cost'],
            'count' => 0,
            'image' => $filePath,
        ]);

        return redirect()->route('products.show', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductType::findOrFail($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductType::findOrFail($id);
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = ProductType::findOrFail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'cost' => ['required', 'string'],
        ]);
        $product->update([
            'name' => $request['name'],
            'cost' => $request['cost'],
        ]);

        return  redirect()->route('products.show' , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductType::findOrFail($id);
        $product->delete();
        return  redirect()->route('products.index');
    }
}
