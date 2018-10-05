@extends("customer.create")

@section("customerId",$customer->id)

@section("customerName",$customer->name)

@section("customerMail",$customer->email)

@section("customerPhone",$customer->phone)

@section("editMethod")
	{{ method_field('PUT') }}
@endsection