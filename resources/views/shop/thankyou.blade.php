@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">
					{{(session('message') == 'success') ? 'Order Confirmed' : 'Something Went wrong'}}
				</div>
				<div class="panel-body">
					<h1 class="text-center">
						<span class="small">
							{{(session('message') == 'success') ? 'Your order has been successfully placed.' : 'Something Went wrong'}}
						</span>
					</h1>
					<hr>

				</div>
			</div>
		</div>
	</div>
@endsection