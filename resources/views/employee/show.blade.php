@extends('layouts.content')

@section('content')
    <div class="d-flex gap-4">
        <div class="mt-1"><a href="{{ route('employee.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
    <div class="pagetitle mt-3">
        <h1>Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/">Employee</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card py-4">
            <div class="card-body">
                <h1 class="mb-4">Employee - {{ $employees->id }}</h1>
                <form class="row g-3" method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Name</label>
                      <input type="text" class="form-control" value="{{ $employees->first_name }} {{ $employees->last_name }}" readonly>
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Company</label>
                      <input type="text" class="form-control" value="{{ $employees->company ? $employees->company->name : 'Tidak ada company' }}" readonly>
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Email</label>
                      <input type="text" class="form-control" value="{{ $employees->email }}" readonly>
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Phone</label>
                      <input type="text" class="form-control" value="{{ $employees->phone }}" readonly>
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Divisi</label>
                      <input type="text" class="form-control" value="{{ $employees->division ? $employees->division->name_division : 'Tidak ada divisi' }}" readonly>
                    </div>
                </form><!-- Vertical Form -->
            </div>
        </div>
    </div>
@endsection