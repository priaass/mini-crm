
@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-4">
        <div class="mt-1"><a href="/akun/" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
    <div class="pagetitle mt-3">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/akun/index">Akun</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Edit Account</h1>
                <form class="row g-3" method="post" action="{{ route('akun.update', $akun->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-6">
                      <label for="inputName" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $akun->name) }}" required autofocus autocomplete="name">  
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror                         
                    </div>

                    <div class="col-6">
                      <label for="inputRole" class="form-label">Role</label>
                      <select name="role" id="role" class="form-control">
                        <option>Plih Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ $akun->role == $role ? 'selected' : '' }}>{{ ucfirst($role) }}</option>
                        @endforeach
                      </select>

                        @error('role')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror                         
                    </div>

                    <div class="col-12">
                      <label for="inputEmail" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $akun->email) }}">
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
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