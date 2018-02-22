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
				<form class="form-horizontal form-create" method="POST" action="{{ route('employee.update', $employees->id) }}" enctype="multipart/form-data">
					{{csrf_field()}}
					{{ method_field('PUT') }}
				  <fieldset>
				    <legend class="text-center">Update Employee</legend>
					@if ($errors->has('name'))
						<p class="notification">{{ $errors->first('name') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 text-update">Name</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->name }}" type="text" class="form-control" id="inputEmail" name="name" placeholder="Enter your name">
				      </div>
				    </div>
				    @if ($errors->has('age'))
							<p class="notification">{{ $errors->first('age') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Age</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->age }}" type="text" class="form-control" id="inputEmail" name="age" placeholder="Enter your age">
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Sex</label>
				      <div class="col-lg-10">
				      	<div class="select-update">
						  <select class="form-control" name="sex">
						    <option>Không xác định</option>
						    <option>Nam</option>
						    <option>Nữ</option>
						  </select>
						</div>
				      </div>
				    </div>
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Email</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->email }}" type="text" class="form-control" id="inputEmail" name="email" placeholder="Enter your email">
				      </div>
				    </div>
				    @if ($errors->has('phonenumber'))
							<p class="notification">{{ $errors->first('phonenumber') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Phone number</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->phonenumber }}" type="text" class="form-control" id="inputEmail" name="phonenumber" placeholder="Enter your phone">
				      </div>
				    </div>
				    @if ($errors->has('skill'))
							<p class="notification">{{ $errors->first('skill') }}</p>
					@endif
				    <div class="form-group">
				      <label class="col-lg-2 control-label text-update">Skill</label>
				      <div class="col-lg-10">
				      	<input value="{{ $employees->skill }}" type="text" class="form-control" id="inputEmail" name="skill" placeholder="Enter your skill">
				      </div>
				    </div>
				    @if ($errors->has('image'))
						<p class="notification">{{ $errors->first('image') }}</p>
					@endif
					<div class="upload-btn-wrapper form-group col-lg-2 control-label">
		  				<button class="btn-upload">Upload avata</button>
		  				<input type="file" name="avata" style="" />
					</div>
				    <div class="form-group">
				    	<div class="col-lg-10 col-lg-offset-2">
				    		<a href="{{ route('employee.index') }}" class="btn btn-primary">Back</a>
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