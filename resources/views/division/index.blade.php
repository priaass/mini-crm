@extends('layouts.content')

@section('content')
<section class="section">
    <div class="d-flex gap-3">
        <div class="mt-1"><a href="{{ route('division.index') }}" class="bi bi-house-door-fill text-black" style="font-size: 2.8rem"></a>
        </div>
        <div class="pagetitle mt-3">
            <a href="#"><h1>Dashboard</h1></a>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Divisons</li>
              </ol>
            </nav>
        </div>
    </div>
  <div class="col-md-12">
      <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
              <h1 class="text-center pt-2 pb-4">Divisions Table</h1>
              @if (Auth::user()->role != 'user')
              <a href="{{ route('division.create') }}" class="btn btn-md btn-primary mb-3">Add Division +</a>
              @endif
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center col-1">No</th>
                            <th scope="col">Divisions</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($divisions as $division)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $division->name_division }}</td>
                                @if (Auth::user()->role != 'user')
                                <td class="text-center">
                                    <form id="delete-form-{{ $division->id }}" action="{{ route('division.destroy', $division->id) }}" method="POST">
                                        <a href="{{ route('division.show', $division->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                        <a href="{{ route('division.edit', $division->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $division->id }})">HAPUS</button>
                                    </form>
                                </td>
                                @endif
                                @if (Auth::user()->role == 'user')
                                <td class="text-center">
                                    <a href="{{ route('division.show', $division->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Division belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
              </div>
              {{ $divisions->links() }}
          </div>
      </div>
  </div>
</section>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Divisi yang dihapus tidak dapat dikembalikan!",
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