@extends('klinik.layouts.app')
@section('title', 'Create Tindakan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Tindakan | Tindakan Baru</h3>
	<div class="row"> 
		<div class="col-lg-12 col-md-12 col-sm-12">
			 
			@if(session('success'))
				<div class="alert alert-success">
					{{session('success')}}
				</div>
			@elseif(session('error'))
				<div class="alert alert-danger">
					{{session('error')}}
				</div>
			@endif


            <div class="card card-stats">
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('tindakan/do_register') }}">
                        {{ csrf_field() }}

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('nama_tindakan') ? ' has-error' : '' }}">
	                        <label for="nama_tindakan" class="col-md-4 control-label">Nama Tindakan</label>

	                        <div class="col-md-6">
	                            <input id="nama_tindakan" type="text" class="form-control" name="nama_tindakan" value="{{ old('nama_tindakan') }}" required autofocus>

	                            @if ($errors->has('nama_tindakan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama_tindakan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 

	                    <div class="form-group{{ $errors->has('jenis_tindakan') ? ' has-error' : '' }}">
	                        <label for="jenis_tindakan" class="col-md-4 control-label">Jenis Jaminan</label>

	                        <div class="col-md-6">
		                        <input type="radio" name="jenis_tindakan" value="UMUM"> UMUM
		                        <input type="radio" name="jenis_tindakan" value="BPJS"> BPJS
		                        <br>
	                            <em>Pilih salah satu jaminan</em>
	                            @if ($errors->has('jenis_tindakan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jenis_tindakan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
 

	                    <div class="form-group{{ $errors->has('tarif_tindakan') ? ' has-error' : '' }}">
	                        <label for="tarif_tindakan" class="col-md-4 control-label">Tarif </label>

	                        <div class="col-md-6">
	                            <input id="tarif_tindakan" type="number" class="form-control" name="tarif_tindakan" value="{{ old('tarif_tindakan') }}" required autofocus placeholder="contoh : 100000">

	                            @if ($errors->has('tarif_tindakan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tarif_tindakan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('tindakan') }}">
			                    <button class="btn btn-primary" type="button">Batal</button>
			                </a>
		                </div>
	              	</div>
              	</form>
            </div>
        </div>
	</div>     
</div>
@stop
