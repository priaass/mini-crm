@extends('layouts.content')

@section('content')
    <div class="container mt-5 mb-5">
        <button class="btn btn-success mb-3">
            <a href="/products/" class="text-decoration-none text-light">Kembali</a>
        </button>   
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('/storage/logo/'.$companies->logo) }}" class="rounded" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $companies->name }}</h3>
                        <hr/>
                        <p>{{ $companies->email }}</p>
                        <hr/>
                        <p>Website : {{ $companies->website }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection