@extends('layouts.app')

@section('content')

<a href="{{ URL::previous() }}" style="float:center;">Go Back</a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">You Don't Have Permission</div>
                </div>
            </div>
        </div>      

    </div>
@endsection

