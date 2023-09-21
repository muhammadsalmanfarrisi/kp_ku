<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Dokumen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dokumen.update', $data_dokumen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik', $data_dokumen->nik) }}" placeholder="Masukkan nik">

                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $data_dokumen->nama) }}" placeholder="Masukkan nama">
                                <label class="font-weight-bold">NOMER REKENING</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $data_dokumen->alamat) }}" placeholder="Masukkan alamat">
                                <label class="font-weight-bold">NILAI KEPUTUSAN</label>
                                <input type="number" class="form-control @error('nomor_surat_nasabah') is-invalid @enderror" name="nomor_nasabah" value="{{ old('nomor_nasabah', $data_dokumen->nomor_nasabah) }}" placeholder="Masukkan nomor_surat_nasabah">
                                <label for="dokumen" class="font-weight-bold">DOKUMEN</label>
                                <input type="file" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen" value="{{ old('dokumen') }}">
                                <!-- error message untuk nama -->
                                @error('nik')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('nomor_surat_nasabah')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('dokumen')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('katadmin.show', session('kategori_id')) }}" class="btn btn-md btn-danger">KEMBALI</a>
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
        // CKEDITOR.replace('harga');
    </script>
</body>

</html>