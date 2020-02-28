@extends('klinik.layouts.app')
@section('title', 'Create Obat')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Obat Baru</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('obat/do_register') }}">
                        {{ csrf_field() }}

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('nama_obat') ? ' has-error' : '' }}">
	                        <label for="nama_obat" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            <input id="name" type="text" class="form-control" name="nama_obat" value="{{ old('nama_obat') }}" required autofocus>

	                            @if ($errors->has('nama_obat'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama_obat') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                     

	                     

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Satuan</label>

	                        <div class="col-md-6">
	                        	<select class="form-control {{ $errors->has('satuan') ? ' has-error' : '' }}" name="satuan" style="height: auto;">
	                        		<option value="Tablet">Tablet</option>
	                        		<option value="Botol">Botol</option>
	                        		<option value="Pcs">Pcs</option>
	                        		<option value="Biji">Biji</option>
	                        		<option value="Pak">Pak</option>
	                        		<option value="Injeksi">Injeksi</option>
	                        		<option value="Sirup">Sirup</option>
	                        		<option value="Salep">Salep</option>
	                        		<option value="Tetes">Tetes</option>
	                        	</select>

	                            @if ($errors->has('satuan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('satuan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Persediaan</label>

	                        <div class="col-md-6">
	                        	<input type="number" name="persediaan" class="form-control{{ $errors->has('persediaan') ? ' has-error' : '' }}">

	                            @if ($errors->has('persediaan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('persediaan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Harga</label>

	                        <div class="col-md-6">
	                        	<input type="number" name="harga_detail" class="form-control{{ $errors->has('harga_detail') ? ' has-error' : '' }}">

	                            @if ($errors->has('harga_detail'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('harga_detail') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    
	                     
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('obat') }}">
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
