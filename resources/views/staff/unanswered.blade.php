@extends('layouts.dash')

@section('page-header', 'Unanswered Queries')

@section('content')
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Query by</th>
				<th>Date</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($enquiries as $enquiry)
				<tr>
					<td>{{$enquiry->id}}</td>
					<td>
						<a href="{{url('admin/enquiry/'.$enquiry->id)}}">
							{{$enquiry->title}}
						</a>
					</td>
					<td>{{$enquiry->user->email}}</td>
					<td>{{$enquiry->created_at->toFormattedDateString()}}</td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection