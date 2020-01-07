@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer List</div>
                </div>
            </div>
        </div>


        <div class="container">
            <table id="customer_list" class="table table-hover table-condensed" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date(In UK)</th>
                
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
         
            $('#customer_list').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    url: "{{route('customer_list')}}",
                    type: 'POST',
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                ],
              
            });
           
        });
    </script>

@stop