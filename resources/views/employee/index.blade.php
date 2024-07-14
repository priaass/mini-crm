@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-3">
        <div class="mt-1"><a href="{{ route('dashboard') }}" class="bi bi-house-door-fill text-black" style="font-size: 2.8rem"></a>
        </div>
        <div class="pagetitle mt-3">
            <a href="/dashboard"><h1>Dashboard</h1></a>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Employees</li>
              </ol>
            </nav>
        </div><!-- End Page Title -->
    </div>
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h1 class="text-center pt-2 pb-4">Employee Table</h1>
                @if (Auth::user()->role != 'user')
                <a href="{{ route('employee.create') }}" class="btn btn-md btn-primary mb-3">Add Employee +</a>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            @if (Auth::user()->role != 'user')
                            <th scope="col" style="width: 20%">ACTIONS</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                @if (Auth::user()->role != 'user')
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('companie.destroy', $employee->id) }}" method="POST">
                                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Companies belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</section>
@endsection