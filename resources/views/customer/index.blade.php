@extends("customer.layout.master")

@section("title","Customer Details")

@section("body")
	<div class="panel panel-primary">
		<div class="panel-heading" >Customer List 
			<a href=" {{ url('customer/create') }} " class="btn btn-success pull-right owtbtn" >Add Customer</a>
		</div>
		<div class="panel-body">
			<table class="table" >
				<thead>
					<tr>
						<th> ID</th>
						<th> Name</th>
						<th> E-Mail</th>
						<th>Phone</th>
						<th>Action</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; ?>
					@foreach($data as $row)
					<tr class="success">
						<td> {{ $i++ }}</td>
						<td> {{ $row->name }} </td>
						<td> {{ $row->email }}</td>
						<td> {{ $row->phone }}</td>
						<td>
						<td>
							<a href="{{ url('customer/'.$row->id.'/edit') }}" class="btn btn-info">Edit</a>

							<form action="/customer/{{ $row->id }}" class="pull-right" method="post">
								{{ csrf_field() }}
								{{ method_field("DELETE") }}
								<button class="btn btn-danger">Delete</button>
							</form>
							
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
			<div>
				{{ $data->links() }}
			</div>
		</div>
	</div>
@endsection