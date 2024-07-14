@extends('layouts.content')

@section('content')
<section class="section">
    <div class="row gap-4 px-4">
        <h1 class="text-center my-3">Welcome to CRUD Laravel Project 
            @if (Auth::user()->role == 'admin')
            <span class="fw-bold">ADMIN !</span>
            @elseif (Auth::user()->role == 'superadmin')
            <span class="fw-bold">SUPERADMIN !</span>  
            @endif     
        </h1>
        <a href="{{ route('companie.index') }}">
            <div class="container d-flex justify-content-between align-items-center border-secondary rounded-top bg-white py-3 px-5  w-100  text-dark">
            <h3 class="mt-2">Companies</h3>
            <i class="bi bi-arrow-right fs-4"></i>
            </div>
        </a>
        <a href="{{ route('employee.index') }}">
            <div class="container d-flex justify-content-between align-items-center border-secondary rounded-top bg-white py-3 px-5  w-100  text-dark">
            <h3 class="mt-2">Employees</h3>
            <i class="bi bi-arrow-right fs-4"></i>
            </div>
        </a>
        <a href="{{ route('division.index') }}">
            <div class="container d-flex justify-content-between align-items-center border-secondary rounded-top bg-white py-3 px-5  w-100 text-dark">
            <h3 class="mt-2">Divisions</h3>
            <i class="bi bi-arrow-right fs-4"></i>
            </div>
        </a>
    </div>
</section>
@endsection