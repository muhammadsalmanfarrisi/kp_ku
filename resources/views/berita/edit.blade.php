<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Berita</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-number/2.1.6/jquery.number.min.js"></script>

</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('berita.update', $data_berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" value="{{ old('judul', $data_berita->judul) }}" placeholder="Masukkan judul">
                                <label for="gambar" class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                    name="gambar" value="{{ old('gambar', $data_berita->gambar) }}">
                                    <label class="font-weight-bold">ISI</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" rows="20"
                                    placeholder="Masukkan isi berita">{{ old('isi', $data_berita->isi) }}</textarea>
                                <!-- error message untuk isi -->
                                @error('judul')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('isi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @error('gambar')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('berita.index') }}" class="btn btn-md btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('isi');
    </script>
</body>

</html>
