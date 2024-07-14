
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
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Add Employee</h1>
                <form class="row g-3" method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                      <label for="inputNanme4" class="form-label">First Name</label>
                      <input type="text" class="form-control" @error('first_name') is-invalid @enderror name="first_name" id="first_name" value="{{ old('first_name') }}" >
                            
                      <!-- error message untuk name -->
                      @error('first_name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-6">
                      <label for="inputNanme4" class="form-label">Last Name</label>
                      <input type="text" class="form-control" @error('last_name') is-invalid @enderror name="last_name" id="last_name" value="{{ old('last_name') }}" >
                            
                      <!-- error message untuk name -->
                      @error('last_name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Company</label>

                      <select name="company" id="company" class="form-control">
                        <option >Pilih Company</option>
                        @foreach ($companies as $companie)
                            <option value="{{ $companie->id }}" @error('company_id') is-invalid @enderror>{{ $companie->name }}</option>
                            <!-- error message untuk name -->
                            @error('last_name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endforeach
                      </select>
                            
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Email</label>
                      <input type="text" class="form-control" @error('email') is-invalid @enderror name="email" id="email" value="{{ old('email') }}" >
                            
                      <!-- error message untuk name -->
                      @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Phone</label>
                      <input type="text" class="form-control" @error('phone') is-invalid @enderror name="phone" id="phone" value="{{ old('phone') }}" >
                            
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