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
                <li class="breadcrumb-item">Divisons</li>
              </ol>
            </nav>
        </div><!-- End Page Title -->
    </div>
  <div class="col-md-12">
      <div class="card border-0 shadow-sm rounded">
          <div class="card-body">
              <h1 class="text-center pt-2 pb-4">Divisions Table</h1>
              @if (Auth::user()->role != 'user')
              <a href="{{ route('division.create') }}" class="btn btn-md btn-primary mb-3">Add Division +</a>
              @endif
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th scope="col">No</th>
                          <th scope="col">Divisions</th>
                          <th scope="col">Member</th>
                          @if (Auth::user()->role != 'user')
                          <th scope="col" style="width: 20%">ACTIONS</th>
                          @endif
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($divisions as $division)
                          <tr>
                              <td>{{ $division->id }}</td>
                              <td>{{ $division->name_division }}</td>
                              <td>{{ $division->member->first_name }} {{ $division->member->last_name }}</td>
                              @if (Auth::user()->role != 'user')
                              <td class="text-center">
                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('companie.destroy', $division->id) }}" method="POST">
                                      <a href="{{ route('division.show', $division->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                      <a href="{{ route('division.edit', $division->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                  </form>
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
              {{ $divisions->links() }}
          </div>
      </div>
  </div>
</section>
@endsection