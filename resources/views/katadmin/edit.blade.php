<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('katadmin.update', $data_kategori->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nomor Surat</label>
                                <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" value="{{ old('nomor_surat', $data_kategori->nomor_surat) }}" placeholder="Masukkan nomor_surat">
                                <!-- error message untuk nomor_surat -->
                                @error('nomor_surat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Keputusan</label>
                                <input type="text" class="form-control @error('keputusan') is-invalid @enderror" name="keputusan" value="{{ old('keputusan', $data_kategori->keputusan) }}" placeholder="Masukkan Jenis keputusan">
                                <!-- error message untuk keputusan -->
                                @error('keputusan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Produk</label>
                                <input type="text" class="form-control @error('program') is-invalid @enderror" name="program" value="{{ old('program', $data_kategori->program) }}" placeholder="Masukkan Jenis program">
                                <!-- error message untuk program -->
                                @error('program')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Instansi</label>
                                <input type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ old('instansi', $data_kategori->instansi) }}" placeholder="Masukkan Asal instansi">
                                <!-- error message untuk keputusan -->
                                @error('instansi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="font-weight-bold">Cabang</label>
                                <input type="text" class="form-control @error('cabang') is-invalid @enderror" name="cabang" value="{{ old('cabang', $data_kategori->cabang) }}" placeholder="Masukkan cabang">
                                <!-- error message untuk cabang -->
                                @error('cabang')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Unit</label>
                                <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit', $data_kategori->unit) }}" placeholder="Masukkan unit">
                                <!-- error message untuk unit -->
                                @error('unit')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Bulan</label>
                                <input type="text" class="form-control @error('bulan') is-invalid @enderror" name="bulan" value="{{ old('bulan', $data_kategori->bulan) }}" placeholder="Masukkan bulan">
                                <!-- error message untuk bulan -->
                                @error('bulan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tahun</label>
                                <input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun', $data_kategori->tahun) }}" placeholder="Masukkan tahun">
                                <!-- error message untuk tahun -->
                                @error('tahun')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <a href="{{ route('katadmin.index') }}" class="btn btn-md btn-danger">KEMBALI</a>
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
        // 
    </script>
</body>

</html>