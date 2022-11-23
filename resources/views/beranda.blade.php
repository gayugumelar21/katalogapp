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

    <!-- search -->
	<div class="container">
		<div class="box">
			<div class="search">
				<form action="/cari" method="GET">
					<input type="text" name="cari" placeholder="Cari Produk">
					<input type="submit" value="Cari Produk">
				</form>
			</div>
		</div>
	</div>

    <!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk Terbaru</h3>
			<div class="box">
	
					<a href="#">
						@foreach($produks as $p)
						<div class="col-4">
							<img src="{{ asset('img_produk_upload/'. $p->gambar_produk) }}" height="55%">
							<h3 class="nama">{{ $p->nama_produk }}</h3>
							<h3 class="harga">Rp. {{ $p->harga_produk }}</h3>
						</div>
						@endforeach
					</a>

			</div>
		</div>
	</div>

</body>
</html>