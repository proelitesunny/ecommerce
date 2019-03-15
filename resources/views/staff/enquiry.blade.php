@extends('layouts.dash')

@section('page-header', 'User Query')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<p><strong>Enquiry By</strong></p>
			<p>{{$enquiry->user->email}}</p>
			<br>
			<p><strong>Title</strong></p>
			<p>{{$enquiry->title}}</p>
			<br>
			<p><strong>Description</strong></p>
			<p>{{$enquiry->message}}</p>
			<br>
			@if($enquiry->reply == null)
				<form method="POST" action="{{url('admin/enquiry/'.$enquiry->id.'/reply')}}">
					{{csrf_field()}}
					<div class="form-group">
						<label for="reply">Reply</label>
						<textarea name="reply" rows="3" class="form-control"></textarea>
					</div>
					<button class="btn btn-success">Submit</button>
				</form>
			@else
				<p><strong>Our reply</strong></p>
				<p>{{$enquiry->reply}}</p>
			@endif
		</div>
	</div>
@endsection