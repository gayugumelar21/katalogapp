<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KatalogApp</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/berandadepan.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
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
            <div class="box-login">
                <div class="form-login">
                    <form action="{{ route('login') }}" method="post" class="form-signin">
                        @csrf
                        @if (Session::has('error'))
                            <div>
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <!-- <label for="">Masukan Email</label> -->
                        <input type="email" id="email" name="email" placeholder="Masukan Email" value="admin@gmail.com" class="email" required autofocus>
                        
                        <!-- <label for="">Masukan Password</label> -->
                        <input type="password" id="password" name="password" placeholder="Masukan Password" value="admin321" class="password" required>

                        <button type="submit" class="btn">Sign In</button>
                    </form>
                </div>
		</div>
	</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
</body>
</html>