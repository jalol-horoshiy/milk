<?php

namespace App\Http\Controllers;

use App\Milk;
use App\ProductType;
use Illuminate\Http\Request;

class MilkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $milks = Milk::where('user_id', auth()->user()->id)->paginate(5);
        return view('milks.index' , compact('milks'));
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
    public function store(Request $request)
    {
        $request->validate([
            'degree' => ['required', 'integer'],
            'liter' => ['required', 'string'],
        ]);

        $milk = Milk::create([
            'degree' => $request['degree'],
            'liter' => $request['liter'],
            'cost' => 3000,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->route('milks.show' , $milk->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $milk = Milk::findOrFail($id);
        $products = ProductType::orderBy('id' , 'desc')->get();
        return view('milks.show',compact('milk') , compact('products'));
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

    public function find(Request $request){
        $id = Milk::findOrFail($request['id']);
        return redirect()->route('milks.show' , $id);
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
        //
    }
    /**
        * @param  \Illuminate\Http\Request  $request
        * @param  int  $id
        * @return \Illuminate\Http\Response
    */

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
