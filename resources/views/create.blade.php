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
				<form class="form-horizontal form-create" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
					{{csrf_field()}}
				  <fieldset class="fieldset-create">
				    <legend class="text-center">Create Employee</legend>
					@if ($errors->has('name'))
						<p class="alert-danger alert text-center">{{ $errors->first('name') }}</p>
					@endif
					<div class="form-group">
				      <label class="col-lg-2 control-label">Name</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="name" placeholder="Enter your name">
				      </div>
				    </div>
					@if ($errors->has('age'))
						<p class="alert-danger alert text-center">{{ $errors->first('age') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Age</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="age" placeholder="Enter your age">
				      </div>
				    </div>
					@if ($errors->has('sex'))
						<p class="alert-danger alert text-center">{{ $errors->first('sex') }}</p>
					@endif
				    <div class="form-group form-group-select">
				      <label class="col-lg-2 control-label">Sex</label>
				      <div class="col-lg-10 div-select">
						  <select class="form-control select-create" name="sex">
						    <option>Không xác định</option>
						    <option>Nam</option>
						    <option>Nữ</option>
						  </select>
				      </div>
				    </div>
					@if ($errors->has('email'))
						<p class="alert-danger alert text-center">{{ $errors->first('email') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Email</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="email" placeholder="Enter your email">
				      </div>
				    </div>
					@if ($errors->has('phonenumber'))
						<p class="alert-danger alert text-center">{{ $errors->first('phonenumber') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Phone number</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="phonenumber" placeholder="Enter your phone">
				      </div>
				    </div>
					@if ($errors->has('skill'))
						<p class="alert-danger alert text-center">{{ $errors->first('skill') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label">Skill</label>
				      <div class="col-lg-10">
				      	<input type="text" class="form-control" name="skill" placeholder="Enter your skill">
				      </div>
				    </div>
				    <div class="upload-btn-wrapper">
		  				<button class="btn-upload">Upload avata</button>
		  				<input type="file" name="avata" style="" />
					</div>
				    <div class="form-group">
				    	<div class="col-lg-10 col-lg-offset-2">
				    		<a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
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
@include('inc.footer')