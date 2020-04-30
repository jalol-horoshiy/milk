<?php

namespace App\Http\Controllers;

use App\History;
use App\HistoryItems;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductType::all();
        $histories = History::where('seller_id' , auth()->user()->id)->orderBy('id' , 'desc')->paginate(5);
        return view('histories.index' , compact('products') , compact("histories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products = ProductType::all();

        $total_cost = 0;
        foreach ($products as $product){
            $x = $request[$product->id];
            $total_cost += $x * ProductType::find($product->id)->cost;
        }
        if ($total_cost == 0){
            return redirect()->route('histories.index');
        }
        $history = auth()->user()->histories()->create([
            'total_cost' => $total_cost,
        ]);
        foreach ($products as $product){
            $x = $request[$product->id];
            if ($x > 0){
                $history_item = HistoryItems::create([
                    'history_id' => $history->id,
                    'product_type_id' => $product->id,
                    'count' => $x,
                    'cost' => ProductType::find($product->id)->cost,
                ]);
                $product->update([
                    'count' => $product->count - $x,
                ]);
            }
        }
        return redirect()->route('histories.show' , $history->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = History::findOrFail($id);
        return view('histories.show', compact('history'));
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
        //
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
