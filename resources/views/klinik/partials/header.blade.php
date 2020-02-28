<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')  | gentamasbali.com  
    </title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <!-- Argon CSS -->
    <link href="{{ asset('front/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/demo/demo.css') }}" rel="stylesheet">

    @yield('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

</head>
<body>
  <div class="wrapper ">
    <!--sidebar-->

    <!--sidebar-->

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-brand" href="#pablo">
              <div class="logo">
                <a href="" class="simple-text logo-mini">
                  <div class="logo-image-small" style="margin-top: -5px;">
                    <img src="{{ asset('img/logo.png') }}" style="max-height: 50px;">
                  </div>
                </a> 
                <a href="" class="simple-text logo-normal">
                </a>
              </div>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar1"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
             
            <ul class="navbar-nav"> 
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url('klinik') }}">
                  Dashboard 
                </a> 
              </li> 

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Master Data 
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                  <a class="dropdown-item" href="{{ url('petugas') }}">
                    Data Petugas RM
                  </a>
                  <a class="dropdown-item" href="{{ url('farmasi') }}">
                    Data Petugas Farmasi
                  </a>
                  <a class="dropdown-item" href="{{ url('kasir') }}">
                    Data Petugas Kasir
                  </a>
                  <a class="dropdown-item" href="{{ url('dokter') }}">
                    Data Petugas Dokter
                  </a>
                  <a class="dropdown-item" href="{{ url('kepala_klinik') }}">
                    Data Kepala Klinik
                  </a>
                  <a class="dropdown-item" href="{{ url('obat') }}">
                    Data Obat
                  </a>
                  <a class="dropdown-item" href="{{ url('tindakan') }}">
                    Data Tindakan
                  </a> 
                  <a class="dropdown-item" href="{{ url('icd10') }}">
                    Data ICD 10
                  </a>
                  
                </div>
              </li> 

               
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Rekam Medis
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                   
                  <a class="dropdown-item" href="{{ url('pasien') }}">
                    Data Pasien
                  </a>
                  <a class="dropdown-item" href="{{ url('kunjungan') }}">
                    Data Kunjungan Berobat
                  </a>
                 
                  <a class="dropdown-item" href="{{ url('pemeriksaan') }}">
                    Pemeriksaan Pasien
                  </a> 

                  <a class="dropdown-item" href="{{ url('coding_rm') }}">
                    Coding Rekam Medis
                  </a> 
 
                </div>
              </li> 
 
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Farmasi
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                  <a class="dropdown-item" href="{{ url('farmasi/obat') }}">
                    Resep
                  </a>
                </div>
              </li>  
 
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kasir
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                  <a class="dropdown-item" href="{{ url('kasir/pembayaran') }}">
                    Pembayaran
                  </a>
                </div>
              </li> 
 
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Laporan
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                  <a class="dropdown-item" href="{{ url('laporan/kunjungan') }}">
                    Lap. Kunjungan
                  </a>
                  <a class="dropdown-item" href="{{ url('laporan/obat') }}">
                    Lap. Obat Keluar
                  </a>
                  <a class="dropdown-item" href="{{ url('laporan/transaksi') }}">
                    Lap. Transaksi
                  </a>
                  <a class="dropdown-item" href="{{ url('laporan/penyakit') }}">
                    Lap. Penyakit
                  </a>
                </div>
              </li>  

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  User
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"> 
                  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
              </li> 
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

