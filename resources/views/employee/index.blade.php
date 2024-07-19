@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-3">
        <div class="mt-1"><a href="{{ route('employee.index') }}" class="bi bi-house-door-fill text-black" style="font-size: 2.8rem"></a>
        </div>
        <div class="pagetitle mt-3">
            <a href="#"><h1>Dashboard</h1></a>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company ? $employee->company->name : 'tidak ada' }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->division ? $employee->division->name_division : 'tidak ada' }}</td>
                                    @if (Auth::user()->role != 'user')
                                    <td class="text-center">
                                        <form id="delete-form-{{ $employee->id }}" action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                            <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $employee->id }})">HAPUS</button>
                                        </form>
                                    </td>
                                    @endif
                                    @if (Auth::user()->role == 'user')
                                    <td class="text-center">
                                        <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    </td>
                                    @endif
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Employee belum Tersedia.
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</section>

@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                showConfirmButton: false,
                timer: 1500,
                text: '{{ session('success') }}'
            });
        });
    </script>
@endif

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Employee yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>  

@endsection