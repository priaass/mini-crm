@extends('layouts.content')

@section('content')
<section class="section">
    <div class="col-xl-12">
        <div class="card p-4">
          <form action="{{ route('contact.store') }}" method="post">
            @csrf
            <div class="row gy-4">
                <h1 class="fw-bold">Contact</h1>
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required readonly>
              </div>    
              <div class="col-md-6 ">
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required readonly>
              </div>
              <div class="col-md-12">
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                @error('subject')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <textarea class="form-control" name="desc" rows="6" placeholder="Message" required></textarea>
                @error('desc')
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
                @enderror
              </div>

              <div class="text-start">
                <button class="btn btn-primary p-2" type="submit">Send Message</button>
              </div>

            </div>
          </form>
        </div>

      </div>
</section>


@endsection