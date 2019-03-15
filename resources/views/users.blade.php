@extends('layouts.dash')

@section('page-header', 'Users')

@section('content')
	@if(session('message'))
		<div class="alert alert-success">
			{{session('message')}}
		</div>
	@endif
	<div class="panel panel-success">
		<div class="panel-heading">Current Admins</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($admins as $admin)
						<tr>
							<td>{{$admin->id}}</td>
							<td>{{$admin->name}}</td>
							<td>{{$admin->email}}</td>
							<td>
								@if(Auth::user()->id != $admin->id)
									<form method="POST" action="{{url('admin/users/makestaff/'.$admin->id)}}">
										{{csrf_field()}}
										<button class="btn btn-primary btn-sm">
											Make Staff
										</button>
									</form>
								@endif
							</td>
							<td>
								@if(Auth::user()->id != $admin->id)
									<form method="POST" action="{{url('admin/users/makecustomer/'.$admin->id)}}">
										{{csrf_field()}}
										<button class="btn btn-primary btn-sm">
											Make Customer
										</button>
									</form>
								@endif
							</td>
							<td>
								@if(Auth::user()->id != $admin->id)
									<form method="POST" action="{{url('admin/users/removeuser/'.$admin->id)}}">
										{{csrf_field()}}
										<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
											<span class="glyphicon glyphicon-remove">
												
											</span>
										</button>
									</form>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="panel panel-danger">
		<div class="panel-heading">Staffs</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($staffs as $staff)
						<tr>
							<td>{{$staff->id}}</td>
							<td>{{$staff->name}}</td>
							<td>{{$staff->email}}</td>
							<td>
								<form method="POST" action="{{url('admin/users/makeadmin/'.$staff->id)}}">
									{{csrf_field()}}
									<button class="btn btn-primary btn-sm">
										Make Admin
									</button>
								</form>
							</td>
							<td>
								<form method="POST" action="{{url('admin/users/makecustomer/'.$staff->id)}}">
									{{csrf_field()}}
									<button class="btn btn-primary btn-sm">
										Make Customer
									</button>
								</form>
							</td>
							<td>
								<form method="POST" action="{{url('admin/users/removeuser/'.$staff->id)}}">
									{{csrf_field()}}
									<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
										<span class="glyphicon glyphicon-remove">
											
										</span>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">Customers</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
					<th></th>
					<th></th>
				</thead>
				<tbody>
					@foreach($customers as $customer)
						<tr>
							<td>{{$customer->id}}</td>
							<td>{{$customer->name}}</td>
							<td>{{$customer->email}}</td>
							<td>
								<form method="POST" action="{{url('admin/users/makeadmin/'.$customer->id)}}">
									{{csrf_field()}}
									<button class="btn btn-primary btn-sm">
										Make Admin
									</button>
								</form>
							</td>
							<td>
								<form method="POST" action="{{url('admin/users/makestaff/'.$customer->id)}}">
									{{csrf_field()}}
									<button class="btn btn-primary btn-sm">
										Make Staff
									</button>
								</form>
							</td>
							<td>
								<form method="POST" action="{{url('admin/users/removeuser/'.$customer->id)}}">
									{{csrf_field()}}
									<button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
										<span class="glyphicon glyphicon-remove">
											
										</span>
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection