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
                <li class="breadcrumb-item">Commpanies</li>
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
                                @if (Auth::user()->role == 'superadmin')
                                <th scope="col" style="width: 20%">ACTIONS</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $companie)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $companie->name }}</td>
                                    <td>{{ $companie->email }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/logo/'.$companie->logo) }}" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                    </td>
                                    <td>{{ $companie->website }}</td>
                                    @if (Auth::user()->role == 'superadmin')
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('companie.destroy', $companie->id) }}" method="POST">
                                            <a href="{{ route('companie.show', $companie->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                            <a href="{{ route('companie.edit', $companie->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                </div>  
                {{ $companies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
@endsection
