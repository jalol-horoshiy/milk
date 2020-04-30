<?php
    use Khill\Lavacharts\Lavacharts;
    $milks = \App\Milk::all();
    $day = array();
    $now = strtotime(date("Y-m-d"));
    $milk_day = array();
    for ($i = 14; $i >= 0; $i --){
         $day[date("d-m-Y" , $now - $i * 24 * 60 * 60)] = 0;
    }

    foreach ($milks as $milk){
        $date = date("d-m-Y" , strtotime($milk->created_at));
        if (empty($milk_day[$date])){
            $milk_day[$date] = 0;
        }
        $milk_day[$date] += $milk->liter;
    }

?>
@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php
                        $lava = new Lavacharts; // See note below for Laravel

                        $population = $lava->DataTable();

                        $population->addStringColumn('Day')
                            ->addNumberColumn('Milk receive');
                        foreach ($milk_day as $value => $item){
                            $population->addRow([$value , $item]);
                        }
                        $lava->AreaChart('Population', $population, [
                            'title' => 'Milk receive',
                            'legend' => [
                                'position' => 'in'
                            ]
                        ]);
                    ?>

                    <div id="pop_div"></div>
                        <?= $lava->render('AreaChart', 'Population', 'pop_div') ?>

                        <br>
                        <center><b>Product count</b></center>
                        <?php
                        $lava1 = new Lavacharts; // See note below for Laravel

                        $votes  = $lava1->DataTable();

                        $votes->addStringColumn('Products')
                            ->addNumberColumn('Counts');
                        $products = \App\ProductType::all();
                        foreach ($products as $product){
                            $votes->addRow([$product->name , $product->count]);
                        }
                        $lava1->BarChart('Votes', $votes);
                        ?>
                        <div id="poll_div"></div>

                        <?= $lava1->render('BarChart', 'Votes', 'poll_div') ?>
                        <?= $lava->renderAll(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
