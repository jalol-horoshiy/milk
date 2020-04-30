<?php
    $products = \App\MilkProduct::where('product_type_id' , $product->id)->get();
    $product_day = array();
    foreach ($products as $item){
        $date = date("d-m-Y" , strtotime($item->created_at));
        if (empty($product_day[$date])){
            $product_day[$date] = [0 , 0];
        }
        $product_day[$date][0] += $item->count;
    }
    $history = \App\HistoryItems::where('product_type_id' , $product->id)->get();
    foreach ($history as $item){
        $date = date("d-m-Y" , strtotime($item->created_at));
        if (empty($product_day[$date])){
            $product_day[$date] = [0 , 0];
        }
        $product_day[$date][1] += $item->count;
    }
?>
@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <a href="{{url('products/edit',$product->id)}}" class="btn btn-warning">Edit</a>
            <a href="{{url('products/delete',$product->id)}}" class="btn btn-danger">Delete</a>
            <table class="table table-striped mt-3">
                <tr>
                    <th>Name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>Count</th>
                    <td>{{$product->count}}</td>
                </tr>
                <tr>
                    <th>Cost</th>
                    <td>{{$product->cost}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="/storage/{{$product->image}}" alt="" style="width: 200px"></td>
                </tr>
            </table>
            <?php

            use Khill\Lavacharts\Lavacharts;

            $lava = new Lavacharts; // See note below for Laravel

            $finances = $lava->DataTable();

            $finances->addStringColumn('Year')
                     ->addNumberColumn('Make')
                     ->addNumberColumn('Sell');
            foreach ($product_day as $value => $item){
                $finances->addRow([$value , $item[0] , $item[1]]);
            }
            $lava->ColumnChart('Finances', $finances, [
                'title' => $product->name." count day",
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);
            ?>
            <div id="perf_div"></div>
            <?= $lava->render('ColumnChart', 'Finances', 'perf_div') ?>
        </div>
    </div>
</div>
@endsection
