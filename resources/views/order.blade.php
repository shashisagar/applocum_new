@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order List</div>
                </div>
            </div>
        </div>


        <div class="container">
            <table id="order_list" class="table table-hover table-condensed" style="width:100%">
                <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Total Amount(in $)</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Action</th>
                
                </tr>
                </thead>
            </table>
        </div>

      

    </div>
@endsection

@section('myjsfile')

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
         
            $('#order_list').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    url: "{{route('order_list')}}",
                    type: 'POST',
                },
                columns: [
                    {data: 'name', name: 'customers.name'},
                    {data: 'total_amount', name: 'orders.total_amount'},
                    {data: 'status', name: 'orders.status'},
                    {data: 'created_at', name: 'orders.created_at'},
                    {data: 'action', name: 'action'},
                ],
              
            });
           
        });
    </script>

@stop