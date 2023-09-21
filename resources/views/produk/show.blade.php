<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Detail Data Produk</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
<div class="container mt-5 mb-5">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card border-0 shadow-sm rounded">
<div class="card-body">
<h5>Nama Produk Jamkrindo: </h5>
<h4><b>{{ $data_produk->nama }}</b></h4><br>
<h5>Deskripsi Produk: </h5>
<p class="tmt-3">
{!! $data_produk->deskripsi !!}
</p>
<a href="{{ route('produk.index') }}" class="btn btn-md btn-danger">KEMBALI</a>
</div>
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>