@include('inc.header')
	<div class="container">
		<legend class="text-center">Read Employee Information</legend>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<img src="http://localhost:81/crud_tutorial/public/img/{{$employees->image}}" style="width: 150px; height:150px; float: left; border-radius: 50%; margin-right: 25px">
				{{ csrf_field() }}
				<h2>{{ $employees->name}}'s Profile</h2>
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
@include('inc.footer')