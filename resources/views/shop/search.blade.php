@extends('layouts.shop')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Search Results</h1>
		</div>
	</div>
	 <div class="row">
        @include('shop.products')
        
    </div>
@endsection