@extends('layouts.content')
@section('content')
@if (Auth::user()->role == 'superadmin')
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Massage</h5>

          <!-- Default Accordion -->
          @forelse ($contact as $index => $c)
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading{{ $index }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                    {{ $c->name }}
                </button>
            </h2>
            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <p>Email : {{ $c->email }}</p>
                    <p>Subject : {{ $c->subject }}</p>
                    <p>Desc : {{ $c->desc }}</p>
                </div>
            </div>
        </div>
    </div><!-- End Default Accordion Example -->
      @empty
          <h1>kosong</h1>
      @endforelse

        </div>
      </div>

    </div>

  </div>
</section>
@else
<script>
  document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
          icon: 'error',
          title: 'Gagal!',
          showConfirmButton: false,
          timer: 2000,
          text: 'Kamu adalah user!'
      }).then(() => {
          window.location = "{{ route('contact.create') }}";
      });
  });
</script>

@endif
@endsection