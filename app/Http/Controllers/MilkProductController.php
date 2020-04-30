<?php

namespace App\Http\Controllers;

use App\Milk;
use App\MilkProduct;
use App\ProductType;
use Illuminate\Http\Request;

class MilkProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $products = MilkProduct::where('milk_id' , $id)->get();
        $items = ProductType::all()->toArray();
        foreach ($products as $product){
            $product->delete();
        }
        foreach ($items as $item) {
            $product = MilkProduct::create([
                'milk_id' => $id,
                'product_type_id' => $item['id'],
                'count' => $request[$item['id']],
            ]);
        }
        $products = ProductType::all();
        foreach ($products as $product){
            $product->update([
               'count'=> $product->milk_products()->sum('count')
            ]);
        }
        return  redirect()->route('milks.show' , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
