@extends('layouts.app')

@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product Details</div>
                </div>
            </div>
        </div>
        <a href="{{ URL::previous() }}" style="float:right;">Go Back</a>

        <div class="container">

            Customer Name: {{$name->name}}
           


            <table id="product_details" class="table table-hover table-condensed" style="width:100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price(in $)</th>
                </tr>
                </thead>

                <tbody>
                
                    @foreach ($data as $data_details)
                              <tr>
                                  <td>{{ $data_details->name}}</td>
                                  <td>{{ $data_details->price}}</td>
                              </tr>                    
                    @endforeach

                </tbody>
            </table>
        </div>

      

    </div>
@endsection

