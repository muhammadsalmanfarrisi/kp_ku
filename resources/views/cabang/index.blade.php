<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All cabang Arsip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>

<body>
    @extends('layouts.app')
    @section('content')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <div class="container mt-5 bg-info-subtle">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Menampilkan Seluruh Cabang</h3>
                    <hr>
                </div>
                &nbsp;&nbsp;&nbsp;
                
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- <a href="{{ route('cabang.create') }}" class="btn btn-sm btn-primary">TAMBAH cabang</a> <br> <br> -->

                        <table class="table table-bordered" id="cabang">
                            <thead>
                            <tr>
                                    <th>NAMA CABANG</th>
                                    <th>ALAMAT</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_cabang as $cabang)
                                <tr>

                                    <td>{{ $cabang->nama }}</td>
                                    <td>{{ $cabang->alamat }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('cabang.destroy', $cabang->id) }}" method="POST">
                                            <a href="{{ route('cabang.show', $cabang->id) }}" class="btn btn-sm btn-info">SHOW</a>
                                            <a href="{{ route('cabang.edit', $cabang->id) }}" class="btn btn-sm btn-dark">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script>
                            $(document).ready(function() {
                                $('#cabang').DataTable({
                                    // Opsi tambahan untuk data table
                                    "pagingType": "full_numbers", // Menampilkan tombol halaman lengkap
                                    "lengthMenu": [10, 25, 50, 75, 100], // Menampilkan pilihan jumlah data per halaman
                                    "language": {
                                        "search": "Cari:", // Mengubah teks "Search" menjadi "Cari"
                                        "paginate": {
                                            "first": "Pertama", // Mengubah teks "First" menjadi "Pertama"
                                            "last": "Terakhir", // Mengubah teks "Last" menjadi "Terakhir"
                                            "next": "Selanjutnya", // Mengubah teks "Next" menjadi "Selanjutnya"
                                            "previous": "Sebelumnya" // Mengubah teks "Previous" menjadi "Sebelumnya"
                                        }
                                    }
                                });
                            });
                        </script>


                        @endsection