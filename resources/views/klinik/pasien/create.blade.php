@extends('klinik.layouts.app')
@section('title', 'Create Pasien')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pasien | Pasien Baru</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('pasien/do_register') }}">
                        {{ csrf_field() }}

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('nama_pasien') ? ' has-error' : '' }}">
	                        <label for="name" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="name" type="text" class="form-control" name="nama_pasien" value="{{ old('nama_pasien') }}" required autofocus>

	                            @if ($errors->has('nama_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jenis Kelamin</label>

	                        <div class="col-md-6">
	                        	<select class="form-control {{ $errors->has('jenis_kelamin_pasien') ? ' has-error' : '' }}" name="jenis_kelamin_pasien" style="height: auto;">
	                        		<option value="Laki - Laki">Laki - Laki</option>
	                        		<option value="Perempuan">Perempuan</option>
	                        	</select>

	                            @if ($errors->has('jenis_kelamin_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jenis_kelamin_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                     
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jalan / Banjar</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="alamat_jalan" class="form-control{{ $errors->has('alamat_jalan') ? ' has-error' : '' }}">

	                            @if ($errors->has('alamat_jalan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat_jalan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Kecamatan</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="alamat_kecamatan" class="form-control{{ $errors->has('alamat_kecamatan') ? ' has-error' : '' }}">

	                            @if ($errors->has('alamat_kecamatan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat_kecamatan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Kabupaten</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="alamat_kabupaten" class="form-control{{ $errors->has('alamat_kabupaten') ? ' has-error' : '' }}">

	                            @if ($errors->has('alamat_kabupaten'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat_kabupaten') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">No Hp</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="no_hp_pasien" class="form-control{{ $errors->has('no_hp_pasien') ? ' has-error' : '' }}">

	                            @if ($errors->has('no_hp_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Tempat Lahir</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="tempat_lahir" class="form-control{{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">

	                            @if ($errors->has('tempat_lahir'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tempat_lahir') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Tahun Lahir</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="tgl_lahir_pasien" class="form-control{{ $errors->has('tgl_lahir_pasien') ? ' has-error' : '' }}">

	                            @if ($errors->has('tgl_lahir_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tgl_lahir_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Umur</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="umur" class="form-control{{ $errors->has('umur') ? ' has-error' : '' }}">

	                            @if ($errors->has('umur'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('umur') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Pekerjaan</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="pekerjaan" class="form-control{{ $errors->has('pekerjaan') ? ' has-error' : '' }}">

	                            @if ($errors->has('pekerjaan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('pekerjaan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('pasien') }}">
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
