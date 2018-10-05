<!DOCTYPE html>
<html>
<head>
	<title>@yield("title")</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.owtcontainer{margin-top: 50px;}
		.owtbtn{margin-top: -6px;}
	</style>
</head>
<body>
	<div>
		<div style="float: left; width: 50%; height: 100px; background-color: 	#383838; color: white">
			<h2 style="margin-top: 30px; margin-left: 70px;">Welcome <b><?php 
				$a = session()->get("admin");
        		echo strtoupper($a);
			//strtoupper(session()->get("admin")); ?> </b></h2>
		</div>
		<div style="float: right; width: 50%; height: 100px; background-color: 	#383838;">
			<form action="/admin/1"  method="post">
								{{ csrf_field() }}
								{{ method_field("DELETE") }}
								<button class="btn btn-warning" style="margin-left: 70%; margin-top: 30px;">Logout</button>
			</form>
			
		</div>
	</div>
	<div  style="float: left; width: 98%; height: 550px; margin-left: 1%; margin-top: 5px;  background-color: #989898;">
		<div class="container owtcontainer"   style="float: left; width: 60%; height: 500px; margin-left: 25%;">
		@if($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)

								<li>{{ $error}} </li>
							@endforeach
						</ul>
					</div>	
				@endif
				@if(session()->has("customerMessage"))
					<div class="alert alert-success">
						<p>
							{{ session()->get("customerMessage") }}
						</p>
					</div>
					
				@endif
		<div class="row">

			@section("body")

			@show
		</div>
	</div>
	</div>
	


</body>
</html>