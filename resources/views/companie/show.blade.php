@extends('layouts.content')

@section('content')
<div class="d-flex gap-4">
    <div class="mt-1"><a href="{{ route('companie.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
<div class="pagetitle mt-3">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/companie/">Companie</a></li>
        <li class="breadcrumb-item active">Show</li>
    </ol>
    </nav>
</div><!-- End Page Title -->
</div>
<div class="row">
    <div class="card py-4">
        <div class="row card-body">
            <h1 class="mb-4">Companie - {{ $companies->id }}</h1>
            <div class="col-md-4">
                <img src="{{ asset('/storage/logo/'.$companies->logo) }}" class="rounded" style="width: 320px; height: 320px; object-fit: cover;">
            </div>
            <div class="col-md-8 mt-4">
                <form class="row g-3" method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Name</label>
                      <input type="text" class="form-control" value="{{ $companies->name }}" readonly>
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Email</label>
                      <input type="text" class="form-control" value="{{ $companies->email }}" readonly>
                    </div>
                    <div class="col-12 mb-4">
                      <label for="inputNanme4" class="form-label">Website</label>
                      <input type="text" class="form-control" value="{{ $companies->website }}" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    {{-- <div class="container mt-5 mb-5">
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
    </div> --}}
@endsection