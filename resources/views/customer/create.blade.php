@extends("customer.layout.master")

@section("title","Customer Application | Create Form")

@section("body")
  
  <div class="panel panel-primary">
    <div class="panel-heading">{{ ucfirst(substr(Route::currentRouteName(),9)) }} Customer 

      <a href="{{ url('customer') }}" class="btn btn-info pull-right owtbtn">Back</a>
    
    </div>
    <div class="panel-body">
      
      <form class="form-horizontal" 
      enctype="multipart/form-data" 
      action="/customer/@yield('customerId')" method="post">
        {{ csrf_field() }}
        @section("editMethod")
        @show
    <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" id="name" value="@yield('customerName')" placeholder="Enter name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email" id="email" value="@yield('customerMail')"  placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Phone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="phone" id="phone" value="@yield('customerPhone')"  placeholder="Enter Contact number">
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>
    </div>
  </div>
</div>

@endsection