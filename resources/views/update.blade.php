<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
</head>
<body>
	@include('inc.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal form-update" method="POST" action="{{ url('/edit', array($employees->id))}}">
					{{csrf_field()}}
				  <fieldset>
				    <legend class="text-center">Update Employee</legend>
					@if(count($errors) > 0)
						@foreach($errors->all() as $error)
							<div class="alert alert-danger">
								{{$error}}
							</div>
						@endforeach
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 text-update">Name</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->name ?>" type="text" class="form-control" id="inputEmail" name="name" placeholder="Enter your name">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Age</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->age ?>" type="text" class="form-control" id="inputEmail" name="age" placeholder="Enter your age">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Sex</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->sex ?>" type="text" class="form-control" id="inputEmail" name="sex" placeholder="Enter your sex">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Email</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->email ?>" type="text" class="form-control" id="inputEmail" name="email" placeholder="Enter your email">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Phone number</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->phonenumber ?>" type="text" class="form-control" id="inputEmail" name="phonenumber" placeholder="Enter your phone">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Skill</label>
				      <div class="col-lg-10">
				      	<input value="<?php echo $employees->skill ?>" type="text" class="form-control" id="inputEmail" name="skill" placeholder="Enter your skill">
				      </div>
				    </div>

				    <!-- <div >
				      <label for="inputPassword" class="col-lg-2 control-label">Description</label>
				      <div class="col-lg-10">
				      	<textarea  name="description" class="form-control" placeholder="Description"><?php echo $employees->description ?></textarea>
				      </div>
				    </div> -->

				    <div class="form-group">
				    	<div class="col-lg-10 col-lg-offset-2">
				    		<a href="{{ url('/')}}" class="btn btn-primary">Back</a>
	    					<button type="submit" class="btn btn-primary">Update</button>
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