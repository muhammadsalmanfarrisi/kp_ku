<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="formkatadmin" action="{{ route('katadmin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="container mt-4">
                                    <label class="font-weight-bold">nomor_surat</label>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat" value="{{ old('nomor_surat') }}" placeholder="Masukkan nomor_surat">

                                    <div class="form-group">
                                        <label for="pilihan"><b>keputusan</b></label>
                                        <select class="form-control" name="keputusan" required>
                                            <option value="PERSETUJUAN">PERSETUJUAN</option>
                                            <option value="PENOLAKAN">PENOLAKAN</option>
                                            <option value="LAIN LAIN">LAIN LAIN</option>
                                        </select>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="pilihan"><b>Program</b></label>
                                        <select id="selectPro" class="form-control" name="produk" required aria-label="Default select example">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihan"><b>Instansi</b></label>
                                        <select id="p_instansi" class="form-control" name="instansi" required aria-label="Default select example">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihan"><b>Cabang</b></label>
                                        <select id="p_cabang" class="form-control" name="cabang" required aria-label="Default select example">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihan"><b>Unit</b></label>
                                        <select id="p_unit" class="form-control" name="unit" required aria-label="Default select example">
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pilihan"><b>Bulan</b></label>
                                        <select class="form-control" name="bulan" required aria-label="Default select example">
                                            <option value="JANUARI">JANUARI</option>
                                            <option value="FEBRUARI">FEBRUARI</option>
                                            <option value="MARET">MARET</option>
                                            <option value="APRIL">APRIL</option>
                                            <option value="MEI">MEI</option>
                                            <option value="JUNI">JUNI</option>
                                            <option value="JULI">JULI</option>
                                            <option value="AGUSTUS">AGUSTUS</option>
                                            <option value="SEPTEMBER">SEPTEMBER</option>
                                            <option value="OKTOBER">OKTOBER</option>
                                            <option value="NOVEMBER">NOVEMBER</option>
                                            <option value="DESEMBER">DESEMBER</option>
                                        </select>
                                    </div>
                                    <label class="font-weight-bold">tahun</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}" placeholder="Masukkan tahun">
                                    <!-- error message untuk nama -->
                                    @error('keputusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('instansi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('program')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('nomor_surat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('bulan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @error('tahun')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary" id="submitButton">SIMPAN</button>
                            <a href="{{ route('katadmin.index') }}" class="btn btn-md btn-danger">KEMBALI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#p_instansi").select2({
                placeholder:'Pilih Instansi',
                ajax: {
                    url: "{{ route('p_instansi.index') }}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });

            $("#p_instansi").change(function(){
                let id = $('#p_instansi').val();
               
                $("#p_cabang").select2({
                placeholder:'Pilih Cabang',
                ajax: {
                    url: "{{url('selectCab')}}/"+ id,
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
            });
            
            $("#p_cabang").change(function(){
                let id = $('#p_cabang').val();

                $("#p_unit").select2({
                placeholder:'Pilih Unit',
                ajax: {
                    url: "{{url('selectUni')}}/"+ id,
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
            });
            $("#selectPro").select2({
                placeholder:'Pilih Produk',
                ajax: {
                    url: "{{ route('s_produk.index') }}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
        });
    </script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#formkatadmin").on('submit', function() {
            // Menonaktifkan tombol submit saat formulir disubmit
            $("#submitButton").prop('disabled', true);
        });
    });
</script>

</body>

</html>