@extends('klinik.layouts.app')
@section('title', 'Edit Petugas')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Edit Fisioterapi</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('fisioterapi/edit_register') }}">
                        {{ csrf_field() }}

                     <input id="id_user" type="hidden" class="form-control" name="id_user" value="{{old('id_user',$user->id)}}" required >

                     <input id="id_fisioterapi" type="hidden" class="form-control" name="id_fisioterapi" value="{{old('id_fisioterapi',$row->id_fisioterapi)}}" required >

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                        <label for="name" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="name" type="text" class="form-control" name="name" value="{{old('name',$user->name)}}" required autofocus>

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
	                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" required >

	                            @if ($errors->has('email'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('email') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 
	                     
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jenis Kelamin</label>

	                        <div class="col-md-6">
	                        	<select class="form-control {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}" name="jenis_kelamin" style="height: auto;">
	                        		<option value="Laki - Laki" {{ ($row->jenis_kelamin == 'Laki - Laki')? 'selected="selected"' : ''}}>Laki - Laki</option>
	                        		<option value="Perempuan" {{ ($row->jenis_kelamin == 'Perempuan')? 'selected="selected"' : ''}}>Perempuan</option>
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
	                        	<input type="text" name="alamat" class="form-control{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}" value="{{ old('alamat', $row->alamat) }}" required>

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
	                        	<input type="text" name="no_hp" class="form-control{{ $errors->has('no_hp') ? ' has-error' : '' }}" value="{{ old('no_hp', $row->no_hp) }}" required>

	                            @if ($errors->has('no_hp'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Tahun Mulai Kerja</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="tahun_mulai_kerja" class="form-control{{ $errors->has('tahun_mulai_kerja') ? ' has-error' : '' }}" value="{{ old('tahun_mulai_kerja', $row->tahun_mulai_kerja) }}" required>

	                            @if ($errors->has('tahun_mulai_kerja'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tahun_mulai_kerja') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="sipf" class="col-md-4 control-label">SIPF</label>

	                        <div class="col-md-6">
	                        	<input type="text" name="sipf" class="form-control{{ $errors->has('sipf') ? ' has-error' : '' }}" value="{{ old('sipf', $row->sipf) }}">

	                            @if ($errors->has('sipf'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('sipf') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('fisioterapi') }}">
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
