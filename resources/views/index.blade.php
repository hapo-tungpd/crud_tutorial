<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<title></title>
</head>
<body>
	@include('inc.header')
	<div class="container">
		<div class="row">
			<legend class="text-center">Manage Employee</legend>
			@if(session('success'))
				{{session('success')}}
			@endif
			<table class="table table-primary table-hover text-center table-home">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Avatar</th>
			      <th scope="col">Name</th>
			      <th scope="col">Age</th>
			      <th scope="col">Sex</th>
			      <th scope="col">Email</th>
			      <th scope="col">Phone number</th>
			      <th scope="col">Skill</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody class="aa">
					@foreach($employee ->all() as $employees)
				    <tr class="table-primary">
				      <th scope="row">{{ $employees->id }}</th>
 							<td><img src="{{ asset('img/'.$employees->image) }}" style="width: 30px; height: 30px; border-radius: 50%;" class="img-home" alt=""></td>
				      <td>{{ $employees->name}}</td>
				      <td>{{ $employees->age}}</td>
				      <td>{{ $employees->sex}}</td>
				      <td>{{ $employees->email}}</td>
				      <td>{{ $employees->phonenumber}}</td>
				      <td>{{ $employees->skill}}</td>
				      <td class="group-button">
				      	<a href="{{ route('employee.show', $employees->id) }}" class="badge badge-primary text-center button">Read</a> |
				      	<a href="{{ route('employee.edit', $employees->id) }}" class="badge badge-warning text-center button">Update</a> |
				      	{{ csrf_field() }}
                {{ method_field('GET') }}
				      	<form class="badge badge-danger button text-center" action="{{ route('employee.destroy', $employees->id) }}" method="POST">
								{{ csrf_field() }}
				      	{{ method_field('DELETE') }}
				      		<button class="badge badge-danger button text-center">Delete</button>
				      	</form>
				      </td>
				    </tr>
			    	@endforeach
			  </tbody>
			</table>
		</div>
	</div>
</body>
</html>
@include('inc.footer')