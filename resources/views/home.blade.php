@extends('template.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">

            <div class="col-6">
                <a href="{{ url('/items/create') }}" class="btn btn-success btn-small">New Item</a>
                </div>

            <div class="card mt-3 ">
                <div class="card-header bg-secondary text-light">Dashboard</div>                
                <div class="card-body">
                  <p>Successfully logged in</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
