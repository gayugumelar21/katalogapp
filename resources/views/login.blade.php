<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KatalogApp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/berandadepan.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <header>
            <div class="container">
                <h1><a href="/">KatalogApp</a></h1>
                <ul>
                    <li><b><a href="/">Produk</a></b></li>
                    <li><b><a href="/about">About</a></b></li>
                    <li><b><a href="/login">Login</a></b></li>
                </ul>
            </div>
    </header>

    <!-- Tentang -->
	<div class="section">
		<div class="container-login">
			<div class="login">
          <form action="{{ route('login') }}" method="post" class="form-signin">
            @csrf
            @if (Session::has('error'))
                <div>
                    {{ Session::get('error') }}
                </div>
            @endif
            <div>
              <label for="inputEmail">Masukan Email</label>
              <input type="email" id="email" name="email" placeholder="Masukan Email" value="admin@gmail.com" required autofocus>
            </div>
            <div>
              <label for="inputPassword">Masukan Password</label>
              <input type="password" id="password" name="password" placeholder="Masukan Password" value="admin321" required>
            </div>
            <button type="submit">Login</button>
        </form>
			</div>
		</div>
	</div>

</body>
</html>