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
    <div class="container"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card border-1 shadow-sm rounded">
                    <div class="card-body">
                        <table>
                            <h2 class="text-center my-3 fw-bold">Profile Employee</h2>
                            <tr>
                                <td><h4>First name</h4></td>
                                <td>: {{ $employees->first_name }}</td>
                            </tr>
                            <tr>
                                <td><h4>Last name</h4></td>
                                <td>: {{ $employees->last_name }}</td>
                            </tr>
                            <tr>
                                <td><h4>Email</h4></td>
                                <td>: {{ $employees->email }}</td>
                            </tr>
                            <tr>
                                <td><h4>Companie</h4></td>
                                <td>: {{ $employees->company->name }}</td>
                            </tr>
                            <tr>
                                <td><h4>Phone</h4></td>
                                <td>: {{ $employees->phone }}</td>
                            </tr>
                            
                        </table>
                        {{-- <h4>Last name   : {{ $employees->last_name }}</h4>
                        <hr/>
                        <h4>Companie    : {{ $employees->company->name }}</h4>
                        <hr/>
                        <h4>Email       : {{ $employees->email }}</h4>
                        <hr/>
                        <h4>Phone       : {{ $employees->phone }}</h4> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection