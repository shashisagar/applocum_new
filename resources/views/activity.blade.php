@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Activity List</div>
                </div>
            </div>
        </div>


        <div class="container">
            <table id="activity_list" class="table table-hover table-condensed" style="width:100%">
                <thead>
                <tr>
                    <th>Properties</th>
                    <th>Created_at</th>
                
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
         
            $('#activity_list').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    url: "{{route('activity_list')}}",
                    type: 'POST',
                },
                columns: [
                    {data: 'properties', name: 'properties'},
                    {data: 'created_at', name: 'created_at'},
                ],
              
            });
           
        });
    </script>

@stop