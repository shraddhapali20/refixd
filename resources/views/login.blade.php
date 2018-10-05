<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="panel panel-primary">
	 <div class="panel-body">
      
      <form class="form-horizontal" 
      enctype="multipart/form-data" 
      action="/admin/" method="post">
        {{ csrf_field() }}
      
    <div class="form-group">
    <label class="control-label col-sm-2" for="name">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="username" id="username"  placeholder="Enter admin username">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="password">Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" id="password"  >
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
  @if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)

								<li>{{ $error}} </li>
							@endforeach
						</ul>
					</div>	
				@endif
</div>
</form>
</body>
</html>