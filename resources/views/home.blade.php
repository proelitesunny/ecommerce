@extends('layouts.shop-full-width')

@section('content')
<?php
    $orders = session()->get('orders');
    $products = array();
    foreach ($orders as $order) {
        foreach ($order as $key => $value) {
            array_push($products, $key);
        }
    }
    var_dump($orders);
?>
@endsection
