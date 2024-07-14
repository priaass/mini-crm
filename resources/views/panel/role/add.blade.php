@extends('products.layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Add New Role</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form</h5>
                        <form class="row g-3" method="post">
                            {{ csrf_field() }}
                            <div class="col-12">
                            <label for="inputNanme4" class="form-label">Nama</label>
                            <input type="text" name="name" required class="form-control" id="inputNanme4">
                            </div>
                            <div class="text-left">
                            <button type="submit" class="btn btn-primary mt-2 px-3">Kirim</button>
                            </div>
                        </form><!-- Vertical Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection