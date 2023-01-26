@extends('customers.layout')
@section('content')
<div class="card">
  <div class="card-header">customer Page</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $customers->name }}</h5>
        <p class="card-text">Address : {{ $customers->address }}</p>
        <p class="card-text">E-mail : {{ $customers->email }}</p>
  </div>
      
  </div>
</div>
@endsection