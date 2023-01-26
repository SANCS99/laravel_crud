@extends('customers.layout')
@section('content')
<div class="card">
  <div class="card-header">Customers Page</div>
  <div class="card-body">
      
      <form action="{{ url('customers') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        
        <label>E-mail</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>

        <label>Address</label></br>
        <input type="text" name="address" id="address" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop