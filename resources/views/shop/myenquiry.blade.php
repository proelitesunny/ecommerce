@extends('layouts.shop-full-width')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Enquiry Details</h1>
			
		</div>
	</div>
			<p><strong>Title</strong></p>
			<p>{{$enquiry->title}}</p>
			<br>
			<p><strong>Description</strong></p>
			<p>{{$enquiry->message}}</p>
			<br>
			@if($enquiry->reply == null)
				<p><strong>Not response yet.</strong></p>
			@else
				<p><strong>Reply from admin</strong></p>
				<p>{{$enquiry->reply}}</p>
			@endif
@endsection