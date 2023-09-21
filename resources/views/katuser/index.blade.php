<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

</head>

<body>
    
@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <div class="container mt-5 bg-info">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Menampilkan Kategori</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                       
                        <table class="table table-bordered" id="kategori_user">
                            <thead>
                                <tr>
                                <th>Nomor Surat</th>
                                <th>Keputusan</th>
                                <th>Produk</th>
                                    <th>Instansi</th>
                                    <th>Cabang</th>
                                    <th>Unit</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_kategori as $kategori)
                                <tr>
                                    
                                <td>{{ $kategori->nomor_surat }}</td>
                                <td>{{ $kategori->keputusan }}</td>  
                                <td>{{ $kategori->program }}</td> 
                                <td>{{ $kategori->instansi }}</td> 
                                    <td>{{ $kategori->cabang }}</td> 
                                    <td>{{ $kategori->unit }}</td> 
                                    <td>{{ $kategori->bulan }}</td> 
                                    <td>{{ $kategori->tahun }}</td>
                                    <td class="text-center">
                                            <a href="{{ route('katuser.show', $kategori->id) }}" class="btn btn-sm btn-primary">SHOW</a>
                                            
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <script>
    $(document).ready(function() {
        $('#kategori_user').DataTable({
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
