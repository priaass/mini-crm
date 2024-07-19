@extends('layouts.content')

@section('content')
<div class="d-flex gap-4">
    <div class="mt-1"><a href="{{ route('division.index') }}" class="bi bi-arrow-left-circle text-black" style="font-size: 3.1rem"></a></div>
<div class="pagetitle mt-3">
    <h1>Dashboard</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/division/">Division</a></li>
        <li class="breadcrumb-item active">Show</li>
    </ol>
    </nav>
</div>
</div>
<div class="row">
    <div class="card py-4">
        <div class="card-body">
            <h1 class="mb-4">Division - {{ $division->id }}</h1>
            <form class="row g-3">
                <div class="col-12">
                  <label class="form-label">Name Division</label>
                  <input class="form-control" value="{{ $division->name_division }}" readonly>
                </div>
                <div class="col-12">
                    <label class="form-label">Employees</label>          
                    <ul class="list-group list-group-numbered">
                    @forelse ($division->employees as $employee)
                        <li class="list-group-item">{{ $employee->first_name }} {{ $employee->last_name }}</li>
                    @empty
                        <input class="form-control" value="Tidak ada employee" readonly>
                    @endforelse
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection