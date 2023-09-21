
@include('layouts.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Masukkan tautan Font Awesome CSS di sini -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Tautan Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap">
<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h2 style="margin-bottom: 0px">Dashboard</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="traffice-source-area mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs">
                    <h3 class="box-title">Petugas / Admin</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash"></div>
                        </li>
                        <li class="text-right sp-cn-r">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-success">
                                <?php
                                // $jumlah_petugas = mysqli_query($koneksi,"select * from petugas");
                                ?>
                                <span class="counter">
                                {{ $adminUserCount }}       
                            </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 table-mg-t-pro-n">
                    <h3 class="box-title">User / Pengguna</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash2"></div>
                        </li>
                        <li class="text-right graph-two-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-purple">
                                <?php
                                // $jumlah_user = mysqli_query($koneksi,"select * from user");
                                ?>
                                <span class="counter">
                                   {{ $userCount }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Kategori Arsip</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-four-ctn">
                            <i class="fa fa-level-down" aria-hidden="true"></i>
                            <span class="text-danger">
                                <?php
                                // $jumlah_kategori = mysqli_query($koneksi, "select * from kategori");
                                ?>
                                <span class="counter">
                                    {{ $kategori }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Total Dokumen</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash3"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                // $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter">
                                    {{ $dokumen }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h5 style="margin-bottom: 0px">Data Instansi</h5>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Daftar Instansi</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash5"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                // $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter">
                                    {{ $instansi }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Daftar Cabang Instansi</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash3"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                // $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter">
                                    {{ $cabang }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Daftar Unit Cabang Instansi</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash2"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                // $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter">
                                    {{ $unit }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Daftar Program Kredit</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div class="sparklinedash"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                // $jumlah_arsip = mysqli_query($koneksi, "select * from arsip");
                                ?>
                                <span class="counter">
                                    {{ $program }}
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h5 style="margin-bottom: 0px">Data Program Dalam Arsip</h5>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($produk as $item)
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">Program {{ $item->nama }}</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                $countProgramArsip = $program_arsip->where('program', $item->nama)->count();
                                ?>
                                <span class="counter">
                                    {{ $countProgramArsip }}
                                    </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <h5 style="margin-bottom: 0px">Data Instansi Dalam Arsip</h5>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($instansi_kat as $ins)
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <h3 class="box-title">{{ $ins->nama }}</h3>
                    <ul class="list-inline two-part-sp">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right graph-three-ctn">
                            <i class="fa fa-level-up" aria-hidden="true"></i>
                            <span class="counter text-info">
                                <?php
                                $countInstansiArsip = $program_arsip->where('instansi', $ins->nama)->count();
                                ?>
                                <span class="counter">
                                    {{ $countInstansiArsip }}
                                    </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list bg-info">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h5 style="margin-bottom: 0px">Berita</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            @foreach ($data_berita as $berita)
                
            <div class="berita-card" style="border: 1px solid #ddd; border-radius: 10px; margin-bottom: 20px;">
                <img src="../storage/{{ $berita->gambar }}" alt="Berita 1" class="card-img-top">
        
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->judul }}</h5>
                    <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Masukkan tautan Bootstrap JavaScript di sini -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@include('layouts.footer')
