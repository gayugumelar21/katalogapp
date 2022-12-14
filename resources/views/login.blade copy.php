<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Katalog App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">
    <form action="{{ route('login') }}" method="post" class="form-signin">
        @csrf
        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/3891/3891710.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Katalog App</h1>
        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <label for="inputEmail" class="sr-only">Masukan Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email" value="admin@gmail.com" required autofocus>
        <label for="inputPassword" class="sr-only">Masukan Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Masukan Password" value="admin321" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; Katalog App 2022</p>
    </form>
</body>
</html>
