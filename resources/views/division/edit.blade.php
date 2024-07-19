
@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-4">
        <div class="mt-1"><a href="{{ route('division.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
    <div class="pagetitle mt-3">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/division/">Division</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-3 mb-4">Edit Division</h1>
                <form class="row g-3" method="post" action="{{ route('division.update', $division->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                      <label for="inputDivision" class="form-label">Division Name</label>
                      <input type="text" class="form-control" @error('division_namae') is-invalid @enderror name="name" value="{{ old('name_division', $division->name_division) }}" >
                            
                      @error('name')
                          <div class="alert alert-danger mt-2">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="employees">Select Employees</label>
                      <div class="mt-2">
                        <ul class="list-group">
                        @foreach ($employees as $employee)
                        <li class="list-group-item">
                            <input class="form-check-input" type="checkbox" name="employees[]" value="{{ $employee->id }}" id="employee{{ $employee->id }}" {{ in_array($employee->id, $division->employees->pluck('id')->toArray()) ? 'checked' : '' }}>
                            <label class="form-check-label ms-1" for="employee{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</label>
                        </li>
                        @endforeach
                        </ul>
                      </div>
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