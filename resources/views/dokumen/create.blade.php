<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Dokumen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-number/2.1.6/jquery.number.min.js"></script>

</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="Masukkan nik">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama">
                                <label class="font-weight-bold">Nomor Rekening</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Nomor Rekening">
                                <label class="font-weight-bold">Nilai Keputusan</label>
                                <input type="number" class="form-control @error('nomor_surat_nasabah') is-invalid @enderror" name="nomor_nasabah" id="nilaiKeputusan" value="{{ old('nomor_nasabah') }}" placeholder="Masukkan Nilai Keputusan (Rp.)">
                                <label for="dokumen" class="font-weight-bold">Dokumen</label>
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
<script>
                            $(document).ready(function() {
    $('#nilaiKeputusan').blur(function() {
        var inputValue = $(this).val();
        var formattedValue = $.number(inputValue, 2, ',', '.'); // Format angka dengan 2 desimal, pemisah ribuan dengan ',' dan desimal dengan '.'

        $(this).val(formattedValue);
    });
});
</script>
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