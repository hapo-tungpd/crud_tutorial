<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@include('inc.header')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal form-update form-create" method="POST" action="{{ url('/edit', array($employees->id))}}" enctype="multipart/form-data">
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
				      	<input value="{{ $employees->name }}" type="text" class="form-control" id="inputEmail" name="name" placeholder="Enter your name">
				      </div>
				    </div>
				    
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Age</label>
				      <div class="col-lg-10">
				      	<input value="{{$employees->age }}" type="text" class="form-control" id="inputEmail" name="age" placeholder="Enter your age">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Sex</label>
				      <div class="col-lg-10">
				      	<input value="{{$employees->sex }}" type="text" class="form-control" id="inputEmail" name="sex" placeholder="Enter your sex">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Email</label>
				      <div class="col-lg-10">
				      	<input value="{{$employees->email }}" type="text" class="form-control" id="inputEmail" name="email" placeholder="Enter your email">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Phone number</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->phonenumber }}" type="text" class="form-control" id="inputEmail" name="phonenumber" placeholder="Enter your phone">
				      </div>
				    </div>

				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Skill</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->skill }}" type="text" class="form-control" id="inputEmail" name="skill" placeholder="Enter your skill">
				      </div>
				    </div>
					
					<div class="upload-btn-wrapper form-group col-lg-2 control-label">
		  				<button class="btn-upload">Upload avata</button>
		  				<input type="file" name="avata" style="" />
					</div>

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
@include('inc.footer')