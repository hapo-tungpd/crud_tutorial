<!DOCTYPE html>
<html>
<head>
	<title>Laravel CRUD Application</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <img class="img-header" src="{{ asset('img/haposoft.png') }}">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
          <a class="text-home-header" href="{{ route('employee.index') }}">Home</a>
          <a class="text-create-header" href="{{ route('employee.create') }}">Create</a>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="search" method="post">
        <input class="form-control mr-sm-2" type="text" placeholder="Search with name" name="search_code">
        {{csrf_field()}}
        {{ method_field('GET') }}
        <button value="Search" name="Submit" class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</body>