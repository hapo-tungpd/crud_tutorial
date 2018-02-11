@include('inc.header')
	<div class="container">
		<legend class="text-center">Read Employee Information</legend>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<img src="{{ asset('img/'.$employee->image) }}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px">
				{{ csrf_field() }}
				<h2>{{ $employee->name}}'s Profile</h2>
			</div>
		</div>
		<table class="table table-striped table-hover text-center">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Name</th>
		      <th scope="col">Age</th>
		      <th scope="col">Sex</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone number</th>
		      <th scope="col">Skill</th>
		    </tr>
		  </thead>
		  <tbody>
			    <tr class="table-active">
			      <td>{{ $employee->id}}</td>
			      <td>{{ $employee->name}}</td>
			      <td>{{ $employee->age}}</td>
			      <td>{{ $employee->sex}}</td>
			      <td>{{ $employee->email}}</td>
			      <td>{{ $employee->phonenumber}}</td>
			      <td>{{ $employee->skill}}</td>
			    </tr>
		  </tbody>
		</table>
		<div class="row">
	    <a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
		</div>
	</div>
@include('inc.footer')