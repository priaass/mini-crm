@extends('layouts.content')

@section('content')
    <div class="container mt-5 mb-5">
        <button class="btn btn-success mb-3">
            <a href="/" class="text-decoration-none text-light">Kembali</a>
        </button>   
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $division->first_name }}</h3>
                        <hr/>
                        <h3>{{ $division->last_name }}</h3>
                        <hr/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection