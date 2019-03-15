@extends('layouts.shop-full-width')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">My Enquiries</h1>
			
		</div>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Date</th>
				<th>Got Response</th>
			</tr>
		</thead>
		<tbody>
			@foreach($enquiries as $enquiry)
				<tr>
					<td>{{$enquiry->id}}</td>
					<td><a href="{{url('myenquiry/'.$enquiry->id)}}">{{$enquiry->title}}</a></td>
					<td>{{$enquiry->created_at->toFormattedDateString()}}</td>
					<td>{{$enquiry->reply == null ? 'No' : 'Yes'}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection