@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-4">
        <div class="mt-1"><a href="{{ route('companie.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
    <div class="pagetitle mt-3">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/companie/">Companie</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Edit Companie</h1>
                <form class="row g-3" method="post" action="{{ route('companie.update', $companies->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="inputName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $companies->name) }}" placeholder="Masukkan Judul Product">
                                
                        <!-- error message untuk name -->
                        @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="text" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email', $companies->email) }}" >
                            
                      <!-- error message untuk name -->
                      @error('email')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputLogo" class="form-label">Logo</label>
                      <input type="file" class="form-control" @error('logo') is-invalid @enderror name="logo" value="{{ old('logo', $companies->logo) }}" >
                            
                      <!-- error message untuk name -->
                      @error('logo')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <label for="inputWebsite" class="form-label">Website</label>
                      <input type="text" class="form-control" @error('website') is-invalid @enderror name="website" value="{{ old('website', $companies->website) }}" >
                            
                      <!-- error message untuk name -->
                      @error('website')
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