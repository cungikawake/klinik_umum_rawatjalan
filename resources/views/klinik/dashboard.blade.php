@extends('klinik.layouts.app')
@section('title', 'dashboard')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <p>Selamat Datang,</p>
  <h3>{{ Auth::user()->name }}</h3>
  <hr>
	<div class="row"> 
    <div class="col-md-6">
      <img src="http://klinikpantiswasti.com/img/6.jpeg" class="img img-responsive" style="width: 100%;">
    </div>
		<div class="col-md-6">
      <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-user-run text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Pasien</p>
                      <p class="card-title">{{ $pasien }}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-glasses-2 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Kunjungan</p>
                      <p class="card-title">{{ $assesment }}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Transaksi</p>
                      <p class="card-title">{{ $transaksi }}
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
	</div>
 

     
</div>
@stop
