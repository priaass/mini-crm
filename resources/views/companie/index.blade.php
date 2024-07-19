@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-3">
        <div class="mt-1"><a href="{{ route('companie.index') }}" class="bi bi-house-door-fill text-black" style="font-size: 2.8rem"></a>
        </div>
        <div class="pagetitle mt-3">
            <a href="#"><h1>Dashboard</h1></a>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Companies</li>
              </ol>
            </nav>
        </div><!-- End Page Title -->
    </div>
    <div class="col-md-12">
        <div class="card border-0 shadow-sm rounded">
            <div class="card-body">
                <h1 class="text-center pt-2 pb-4">Companies Table</h1>
                @if (Auth::user()->role == 'superadmin')
                <a href="{{ route('companie.create') }}" class="btn btn-md btn-primary mb-3">Add Companie +</a>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $companie)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $companie->name }}</td>
                                    <td>{{ $companie->email }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/logo/'.$companie->logo) }}" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                    </td>
                                    <td>{{ $companie->website }}</td>
                                    @if (Auth::user()->role == 'superadmin')
                                    <td class="text-center">
                                        <form id="delete-form-{{ $companie->id }}" action="{{ route('companie.destroy', $companie->id) }}" method="POST">
                                            <a href="{{ route('companie.show', $companie->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('companie.edit', $companie->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $companie->id }})">HAPUS</button>
                                        </form>
                                        {{-- @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif --}}
                                    </td>
                                    @endif
                                    @if (Auth::user()->role != 'superadmin')
                                    <td class="text-center">
                                        <a href="{{ route('companie.show', $companie->id) }}" class="btn btn-sm btn-dark">SHOW</a>
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
                </div>  
                {{ $companies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>

@if(session('masuk'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            Toast.fire({
                icon: 'success',
                title: '{{ session('masuk') }}'
            });
        });
    </script>
@endif

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Companie yang dihapus tidak dapat dikembalikan!",
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

@endsection
