@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="card">
	  <div class="card-header">
	  	<div class="row">
	  		<div class="col-10">
	    		<h2 class="font-weight-bold text-success">Users List</h2>
	    	</div>
	    	
	    	<div class="col-2">
	    		<a href="{{route('admin.users.create')}}" type="button"  name="add" id="add" class="btn btn-outline-success btn-block float-right"  >
	    			<i class="far fa-plus-square"></i> <span>Add<span>
	    		</a>
	    	</div>	
	  </div>
	  <div class="card-body">
	  	
	    <table class="table table-hover table-dark table-responsive-lg data-table">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
			      <th scope="col">Role</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@php $i=1; @endphp
			  	@foreach($users as $user)
			  		<tr>
			  			<th scope="row">{{$i++}}</th>
			  			<td>{{$user->name}}</td>
			  			<td>{{$user->email}}</td>
			  			<td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>

			  			@can('crud')
				  			<td>
				  				<a href="{{route('admin.users.edit', $user->id)}}" type="button" class="btn btn-outline-warning float-left">Edit</a>

				  				<form method="POST" action="{{route('admin.users.destroy', $user)}}" class="float-left" onsubmit="return confrim('Are You Sure Want To Delete?')">
				  					@csrf
				  					@method('DELETE')
				  					<button type="submit" class="btn btn-outline-danger">Delete</button>
				  				</form>
				  			</td>
			  			@endcan
			  		</tr>

			  	@endforeach

			  	
			  </tbody>
		</table>
	  </div>
</div>

@endsection
