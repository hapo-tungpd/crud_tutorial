<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
</head>
<body>
	@include('inc.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" method="POST" action="{{ url('/insert')}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Create Employee</legend>
					@if(count($errors) > 0)
						@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								{{$error}}
							</div>
						@endforeach
					@endif
					<div class="form-group">
				      <label class="col-lg-2 control-label">Name</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="name" placeholder="Enter your name">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Age</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="age" placeholder="Enter your age">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label">Sex</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="sex" placeholder="Enter your sex">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label">Email</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="email" placeholder="Enter your email">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label">Phone number</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="phonenumber" placeholder="Enter your phone">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label">Skill</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="skill" placeholder="Enter your skill">
				      </div>
				    </div>
					
				    <!-- <div class="form-group">
				      <label for="inputEmail" class="col-lg-2 control-label">Test1</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" id="inputEmail" name="Test1" placeholder="Enter email">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label for="inputPassword" class="col-lg-2 control-label">Description</label>
				      <div class="col-lg-10">
				      	<textarea name="description" class="form-control" placeholder="Description"></textarea>
				      </div>
				    </div> -->

				    <div class="form-group">
				    	<div class="col-lg-10 col-lg-offset-2">
				    		<a href="{{ url('/')}}" class="btn btn-primary">Back</a>
				    		<button type="submit" class="btn btn-primary">Submit</button>
				    	</div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<!-- @include('inc.footer') -->