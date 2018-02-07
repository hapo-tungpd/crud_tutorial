@include('inc.header')
	<div class="container">
		<legend class="text-center">Read Employee Information</legend>
		<!-- <div class="row">
			<legend>Read Employees</legend>
			<p class="lead">{{$employees->name}}</p>
			<p class="lead">{{$employees->age}}</p>
			<p class="lead">{{$employees->sex}}</p>
			<p class="lead">{{$employees->email}}</p>
			<p class="lead">{{$employees->phonenumber}}</p>
			<p class="lead">{{$employees->skill}}</p>
			<p class="lead">{{$employees->title}}</p>
			<p>{{$employees->description}}</p>
		</div>
		<div class="row">
		    		<a href="{{ url('/')}}" class="btn btn-primary">Back</a>
		    	</div> -->
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
			      <td>{{ $employees->id}}</td>
			      <td>{{ $employees->name}}</td>
			      <td>{{ $employees->age}}</td>
			      <td>{{ $employees->sex}}</td>
			      <td>{{ $employees->email}}</td>
			      <td>{{ $employees->phonenumber}}</td>
			      <td>{{ $employees->skill}}</td>
			    </tr>
		  </tbody>
		</table>
		<div class="row">
	    <a href="{{ url('/')}}" class="btn btn-primary">Back</a>
		</div>
	</div>
<!-- @include('inc.footer') -->