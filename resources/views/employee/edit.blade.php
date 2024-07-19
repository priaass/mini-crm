
@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-4">
        <div class="mt-1"><a href="{{ route('employee.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
    <div class="pagetitle mt-3">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/">Employee</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Edit Employee</h1>
                <form class="row g-3" method="post" action="{{ route('employee.update', $employees->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                      <label for="inputFName" class="form-label">First Name</label>
                      <input type="text" class="form-control" @error('first_name') is-invalid @enderror name="first_name" value="{{ old('first_name', $employees->first_name) }}" >
                            
                      <!-- error message untuk name -->
                      @error('first_name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-6">
                      <label for="inputLName" class="form-label">Last Name</label>
                      <input type="text" class="form-control" @error('last_name') is-invalid @enderror name="last_name" value="{{ old('last_name', $employees->last_name) }}" >
                            
                      <!-- error message untuk name -->
                      @error('last_name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputCompany" class="form-label">Company</label>

                    <select name="company" class="form-control @error('company') is-invalid @enderror">
                        <option value="">Pilih Company</option>
                        @foreach ($companies as $companie)
                            <option value="{{ $companie->id }}" {{ old('company', $employees->company_id) == $companie->id ? 'selected' : '' }}>{{ $companie->name }}</option>
                        @endforeach
                    </select>
                            
                    </div>
                    <div class="col-12">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="text" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email', $employees->email) }}" >
                            
                      <!-- error message untuk name -->
                      @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputPhone" class="form-label">Phone</label>
                      <input type="number" class="form-control" @error('phone') is-invalid @enderror name="phone" value="{{ old('phone', $employees->phone) }}" >
                            
                      <!-- error message untuk name -->
                      @error('phone')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    
                    
                    <div class="mt-4">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form><!-- Vertical Form -->
            </div>
        </div>
    </div>
</section>
@endsection
{{-- <div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body my-4">

                    <h1 class="text-center my-2 font-weight-bold">Edit Employee</h1>
                    <form action="{{ route('employee.update', $employees->id) }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-1 ms-1">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employees->name) }}" placeholder="Masukkan Judul Product">
                            
                            <!-- error message untuk name -->
                            @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-1 ms-1">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employees->email) }}"></input>
                            
                            <!-- error message untuk email -->
                            @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label class="font-weight-bold mb-1 ms-1">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                        
                            <!-- error message untuk logo -->
                            @error('logo')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-1 ms-1">Website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website', $employees->website) }}">
                                
                                    <!-- error message untuk website -->
                                    @error('website')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>

                        <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>

                    </form> 
                </div>
            </div>
        </div>
    </div>
</div> --}}