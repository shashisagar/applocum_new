@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product List</div>
                </div>
            </div>
        </div>


        <div class="container">
            <table id="product_list" class="table table-hover table-condensed" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price(in $)</th>
                    <th>In Stock(tick indicated in stock)</th>
                
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
         
            $('#product_list').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    url: "{{route('product_list')}}",
                    type: 'POST',
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'price', name: 'price'},
                    {data: 'action', name: 'action'},
                ],
              
            });
         })
           


         $(document).ready(function(){
        $(document.body).on('change','.toggle-class',function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var product_id = $(this).data('id'); 
          $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('changeStatus')}}",
            data: {'status': status, 'product_id': product_id},
            success: function(data){
              alert("Updated successfully");
            }
           });
        });
         });


    </script>

@stop