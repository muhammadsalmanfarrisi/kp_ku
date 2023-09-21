<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini</title>
    <!-- Masukkan tautan Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Masukkan tautan Font Awesome CSS di sini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Tautan Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
    <style>
        /* Gaya kustom */
        body {
            background-image: url('background.jpg');
            /* Ganti 'background.jpg' dengan URL atau path ke gambar latar belakang Anda */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #fff;
            /* Warna teks yang kontras dengan latar belakang */
            font-family: 'Open Sans', sans-serif;
            /* Menggunakan font Google Fonts 'Open Sans' */
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            /* Latar belakang semi-transparan untuk konten */
            padding: 20px;
            border-radius: 10px;
        }

        .headline-img {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }

        .berita-content {
            margin-top: 20px;
        }

        .berita-content p {
            font-size: 18px;
            line-height: 1.6;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5);
            /* Latar belakang semi-transparan untuk navbar */
        }

        .navbar-brand {
            font-size: 24px;
            color: #fff;
        }

        .nav-link {
            font-size: 18px;
            color: #fff;
        }

        .nav-link:hover {
            color: #ccc;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><i class="fas fa-newspaper"></i> Berita Terkini</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $data_berita->judul }}</h1>
                <img src="../storage/{{ $data_berita->gambar }}" alt="Gambar Berita" class="headline-img">
                <div class="berita-content">
                    {!! $data_berita->isi !!}
                </div>
            </div>
            <div class="col-md-4">
                <h3><i class="fas fa-link"></i> Berita Terkait</h3>
                <div class="list-group">
                    @foreach ($data_lain as $berita)
                        <a href="{{ route('berita.show', $berita->id) }}" class="list-group-item list-group-item-action">{{ $berita->judul }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Masukkan tautan Bootstrap JavaScript di sini -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
