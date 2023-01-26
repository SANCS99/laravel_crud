@extends('customers.layout')
@section('content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
    <div class="container">
        <div class="row">
            <div class="col-md-9" style ='width:100%'>
                <div class="card">
                    <div class="card-header">
                        <h2>Laravel 9 Crud</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/customers/create') }}" class="btn btn-success btn-sm" title="Add New customer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <div class="container">

                            <div class="search"><input type="search" name="search" id="search" placeholder ="Search...!" class="form-control">

                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Mobile</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="alldata">
                                @foreach($customers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('/customers/' . $item->id) }}" title="View customer"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/customers/' . $item->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            <form method="POST" action="{{ url('/customers' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <a class="btn btn-danger btn-sm" title="Delete customer" style="color: #000;" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tbody id="Content" class="searchdata"></tbody>
                            </table>

                            <script type="text/javascript">
                                
                                $('#search').on('keyup',function()
                                {
                                    $value=$(this).val();

                                    if($value){
                                        $('.alldata').hide();
                                        $('searchdata').hide();
                                    }

                                    $.ajax({
                                        
                                        type:'get',
                                        url:'{{URL::to('search')}}',
                                        data:{'search':$value},

                                        success:function(data)
                                        {
                                            console.log(data);
                                            $('#Content').html(data);
                                        }

                                    });
                                })
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection