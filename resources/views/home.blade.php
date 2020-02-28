@extends('layouts.app')
@section('title', 'layanan kesehatan')
@section('content') 

    <!-- Navigation area starts -->
    <div class="menu-area navbar-fixed-top">
        <div class="container">
            <div class="row">

                <!-- Navigation starts -->
                <div class="col-md-12">
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="">
                                	<img src="{{ asset('img/logo.png') }}" style="max-height: 50px; margin-top: -10px;">
                                </a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smooth_scroll" href="{{url('#slider')}}">HOME</a></li> 
                                        <li><a class="smooth_scroll" href="{{url('#service')}}">LAYANAN</a></li>
                                        <li><a class="smooth_scroll" href="{{url('#testimonial')}}">GALERI</a></li>
                                        <li><a class="smooth_scroll" href="{{url('#contact')}}">KONSULTASI</a></li>
                                        <li><a  href="{{route('login')}}">LOGIN</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation ends -->

            </div>
        </div>
    </div>
    <!-- Navigation area ends -->



    <!-- Slider area starts -->
    <section id="slider" class="slider-area grd-bg">


        <div id="carousel-example-generic" class="carousel slide carousel-fade">

            <div class="carousel-inner" role="listbox">

                <!-- Item 1 -->
                <div class="item active">
                    <div class="table">
                        <div class="table-cell">
                            <div class="intro-text">
                                <div class="container">
                                    <div class="row">

                                        <!-- intro image -->
                                        <div class="col-md-6 col-md-push-6 col-sm-12 intro-img">
                                            <img class="animated fadeInDown img img-responsive" src="{{ asset('assets/images/WhatsApp Image 2019-08-13 at 21.50.56.jpeg') }}" alt="FISIOTERAPI" style="max-height: 300px;">
                                        </div>

                                        <!-- intro text -->
                                        <div class="col-md-6 col-md-pull-6 col-sm-12">
                                            <h1 class="animated fadeInDown">KLINIK PRATAMA PANTI SWASTI TANGEB</h1>
                                            <p class="animated fadeInDown">Melayani dengan Integritas</p>
                                            <ul class="animated fadeInDown">
                                                <li>Kami siap melayani, perawatan dan pengobatan kesehatan anda.</li> 
                                                <li>No SIPK. 864/BPPT/KLP/II/2014</li>
                                            </ul> 
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="item">
                    <div class="table">
                        <div class="table-cell">
                            <div class="intro-text">
                                <div class="container">
                                    <div class="row">

                                        <!-- intro image -->
                                        <div class="col-md-6 col-sm-12 intro-img">
                                            <img class="animated fadeInDown" src="{{ asset('img/6.jpeg') }}" alt="FISIOTERAPI">
                                        </div>

                                        <!-- intro text -->
                                        <div class="col-md-6 col-sm-12">
                                            <h1 class="animated fadeInDown">Tim Medis Profesional</h1>
                                            <p class="animated fadeInDown">Siap melayani anda setulus hati</p>
                                              
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Wrapper for slides-->


            <!-- Carousel Pagination -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>


            <!-- Slider left right button -->
            <!-- <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <img src="assets/img/left-arrow.png" alt="">
            </a>

            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <img src="assets/img/right-arrow.png" alt="">
            </a> -->

        </div>

        <!-- bootstrap carousel -->

    </section>
    <!-- Slider area ends -->


    <!-- Hero boxes starts -->
    <div class="hero-boxes" id="service" style="margin-bottom: 20px;">
        <div class="container">
            <div class="row">

                <!-- Hero box -->
                <div class="col-md-4 col-sm-4">
                    <div class="hero-box grd-bg">
                        <img src="{{ asset('assets/images/antibiotics.png')}}" alt="Pelayanan" style="max-height: 100px;">
                        <h3 class="subtitle" style="color: #fff;">Jadwal Pelayanan</h3>
                        <p style="text-align: center; color: #fff;">HARI SENIN - MINGGU</p>
                    </div>
                </div>

                <!-- Hero box -->
                <div class="col-md-4 col-sm-4">
                    <div class="hero-box grd-bg">
                        <img src="{{ asset('assets/images/research.png')}}" alt="Pelayanan" style="max-height: 100px;">
                        <h3 class="subtitle" style="color: #fff;">Dokter</h3>
                        <p style="text-align: center; color: #fff;">Dokter umum</p>
                         
                        <p style="text-align: center; color: #fff;">1. dr.I Gede Putu Wijane</p>
                        <p style="text-align: center; color: #fff;">2. dr. Luh Gede Chandra Kasih</p>
                        <p style="text-align: center; color: #fff;">3. dr. I Nyoman Diane</p>
                        <p style="text-align: center; color: #fff;">Dokter gigi :</p>
                        <p style="text-align: center; color: #fff;">1. drg. Kadek Meutajaya</p>
                    </div>
                </div>

                <!-- Hero box -->
                <div class="col-md-4 col-sm-4">
                    <div class="hero-box grd-bg">
                        <img src="{{ asset('assets/images/research.png')}}" alt="TERAPIS" style="max-height: 100px;">
                        <h3 class="subtitle" style="color: #fff;">LAYANAN</h3>
                        <p style="text-align: center;color: #fff;">Balai pengobatan</p>
                        <p style="text-align: center;color: #fff;">Keluarga berencana</p>
                        <p style="text-align: center;color: #fff;">Vaksinasi</p>
                        <p style="text-align: center;color: #fff;">Laboratorium</p>
                        <p style="text-align: center;color: #fff;">Periksa hamil</p>
                        <p style="text-align: center;color: #fff;">Melahirkan</p>
                        <p style="text-align: center;color: #fff;">Observasi</p>
                        <p style="text-align: center;color: #fff;">Balai pengobatan gigi</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Hero boxes ends -->

  


    <!-- Testimonial area starts -->
    <section id="testimonial" class="testimonial-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2></h2> 
                    </div>
                </div>
            </div>        

            <div class="row">

                <div class="col-md-12">
                    <div class="testimonial-list">

                        <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/1.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>

                        <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/2.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>

                        <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/3.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div> 
                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/4.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div> 

                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/5.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div> 

                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/6.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>
                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/7.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>
                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/8.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>
                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/9.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>
                         <!-- Testimonial item -->
                        <div class="single-testimonial">
                            <img src="{{ asset('img/10.jpeg')}}" alt="fisioterapi" style="max-height: 300px;"> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Testimonial area ends -->



    <!-- Contact area starts -->
    <section id="contact" class="contact-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>HUBUNGI KAMI</h2>
                        <p>Saatnya anda menjadi sehat kembali</p>
                    </div>
                </div>
            </div>

            <div class="row"> 
                <div class="col-md-12 text-center"> 
                    <div class="address"> 
                        <div class="address-box clearfix">
                            <p>Jl. Raya Tangeb No. 25, Abianbase, Kec. Mengwi, Kabupaten Badung, Bali 80351</p>
                        </div>
                        <div class="address-box clearfix">
                            <p><a href="tel:015110022">(0361) 9006243</a></p>
                        </div> 
                        <div class="address-box clearfix">
                            <p><a href="http://klinikpantiswasti.com/">www.klinikpantiswasti.com</a></p>
                        </div>
 
                    </div>

                </div>


            </div>

        </div>
    </section>
    <!-- Contact area ends -->

@endsection
