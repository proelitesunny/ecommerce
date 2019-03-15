@extends('layouts.shop')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">{{$cat}}</h1>
		</div>
	</div>
	<div class="row">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @include('shop.products')
    </div>
@endsection