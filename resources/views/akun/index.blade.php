@extends('layouts.content')

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
              <h1 class="text-center my-2">List Account</h1>
              <a href="{{ route('akun.create') }}" class="btn btn-md btn-primary mb-4">Add Account +</a>
              @if (Auth::user()->role == 'superadmin')
              <table class="table table-bordered mb-4">
                <h3 class="ms-2 fw-bold">Superadmin</h3>
                  <thead>
                      <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="col-2">Name</th>
                          <th scope="col" class="col-5">Email</th>
                          <th scope="col" class="col-2">Role</th>
                          <th scope="col" style="width: 20%">ACTIONS</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($akun->where('role', 'superadmin') as $a)
                          <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>{{ $a->name }}</td>
                              <td>{{ $a->email }}</td>
                              <td>{{ $a->role }}</td>
                              <td class="text-center">
                                  <form id="delete-form-{{ $a->id }}" action="{{ route('akun.destroy', $a->id) }}" method="POST">
                                      <a href="{{ route('akun.edit', $a->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $a->id }})">HAPUS</button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <div class="alert alert-danger">
                            Superadmin belum tersedia.
                          </div>
                      @endforelse
                  </tbody>
              </table>
              @endif

              {{-- Admin --}}
              <table class="table table-bordered mb-4">
                <h3 class="ms-2 fw-bold">Admin</h3>
                  <thead>
                      <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="col-2">Name</th>
                          <th scope="col" class="col-5">Email</th>
                          <th scope="col" class="col-2">Role</th>
                          <th scope="col" style="width: 20%">ACTIONS</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($akun->where('role', 'admin') as $a)
                          <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>{{ $a->name }}</td>
                              <td>{{ $a->email }}</td>
                              <td>{{ $a->role }}</td>
                              <td class="text-center">
                                  <form id="delete-form-{{ $a->id }}" action="{{ route('akun.destroy', $a->id) }}" method="POST">
                                      <a href="{{ route('akun.edit', $a->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $a->id }})">HAPUS</button>
                                  </form>
                              </td>
                          </tr>
                      @empty
                          <div class="alert alert-danger">
                            Admin belum tersedia.
                          </div>
                      @endforelse
                  </tbody>
              </table>

              {{-- User --}}
              <table class="table table-bordered">
                  <h3 class="ms-2 fw-bold">User</h3>
                  <thead>
                      <tr>
                          <th scope="col" class="text-center">No</th>
                          <th scope="col" class="col-2">Name</th>
                          <th scope="col" class="col-5">Email</th>
                          <th scope="col" class="col-2">Role</th>
                          <th scope="col" style="width: 20%">ACTIONS</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($akun->where('role', 'user') as $a)
                          <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>{{ $a->name }}</td>
                              <td>{{ $a->email }}</td>
                              <td>{{ $a->role }}</td>
                              <td class="text-center">
                                  <form id="delete-form-{{ $a->id }}" action="{{ route('akun.destroy', $a->id) }}" method="POST">
                                      <a href="{{ route('akun.edit', $a->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $a->id }})">HAPUS</button>
                                  </form>   
                              </td>
                          </tr>
                      @empty
                          <div class="alert alert-danger">
                            User belum tersedia.
                          </div>
                      @endforelse
                  </tbody>
              </table>
              {{ $akun->links() }}
          </div>
      </div>
  </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akun yang dihapus tidak dapat dikembalikan!",
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