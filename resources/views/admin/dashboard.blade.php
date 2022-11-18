<!-- mengimpor file master.blade.php sebagai kerangka tampilan -->
@extends('admin.layout.master')

@push('css')
<!-- CSS tambahan halaman dashboard jika ada -->
@endpush

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Beranda</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
      </div>
      @if (Session::has('error'))
        <div class="alert alert-danger">
          {{ Session::get('error') }}
        </div>
      @endif

      <p>Welcome to beranda admin, <strong>{{ Auth::user()->name }}</strong></p>
      <p>Your role is <strong>{{ Auth::user()->role }}</strong></p>
</main>
@endsection

@push('js')
<!-- JS tambahan halaman dashboard jika ada -->
@endpush