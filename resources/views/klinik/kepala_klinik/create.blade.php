@extends('klinik.layouts.app')
@section('title', 'Create Kepala Klinik')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Kepala Klinik Baru</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('kepala_klinik/do_register') }}">
                        {{ csrf_field() }}

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                        <label for="name" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

	                            @if ($errors->has('name'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('name') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	                        <label for="email" class="col-md-4 control-label">Username</label>

	                        <div class="col-md-6">
	                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
	                        <label for="password" class="col-md-4 control-label">Password</label>

	                        <div class="col-md-6">
	                            <input id="password" type="password" class="form-control" name="password" required>

	                            @if ($errors->has('password'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('password') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

	                        <div class="col-md-6">
	                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jenis Kelamin</label>

	                        <div class="col-md-6">
	                        	<select class="form-control {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}" name="jenis_kelamin" style="height: auto;">
	                        		<option value="Laki - Laki">Laki - Laki</option>
	                        		<option value="Perempuan">Perempuan</option>
	                        	</select>

	                            @if ($errors->has('jenis_kelamin'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Alamat</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="alamat" class="form-control{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">

	                            @if ($errors->has('alamat'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">No Hp</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="no_hp" class="form-control{{ $errors->has('no_hp') ? ' has-error' : '' }}">

	                            @if ($errors->has('no_hp'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Tanggal Lahir</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="tgl_lahir" class="form-control{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">

	                            @if ($errors->has('tgl_lahir'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tgl_lahir') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('kepala_klinik') }}">
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
