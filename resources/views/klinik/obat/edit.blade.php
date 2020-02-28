@extends('klinik.layouts.app')
@section('title', 'Edit Obat')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Update Obat</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('obat/edit_register') }}">
                        {{ csrf_field() }}

                    <input type="hidden" name="id_obat" class="form-control{{ $errors->has('id_obat') ? ' has-error' : '' }}" value="{{ old('id_obat', $row->id_obat) }}">


	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('nama_obat') ? ' has-error' : '' }}">
	                        <label for="nama_obat" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                            
	                            <input id="name" type="text" class="form-control" name="nama_obat" value="{{ old('nama_obat', $row->nama_obat) }}" required autofocus>


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
	                        		<option value="Tablet" {{ ($row->satuan == "Tablet")? "selected='selected'" : ''}}>Tablet</option>
	                        		<option value="Botol" {{ ($row->satuan == "Botol")? "selected='selected'" : ''}}>Botol</option>
	                        		<option value="Pcs" {{ ($row->satuan == "Pcs")? "selected='selected'" : ''}}>Pcs</option>
	                        		<option value="Biji" {{ ($row->satuan == "Biji")? "selected='selected'" : ''}}>Biji</option>
	                        		<option value="Pak" {{ ($row->satuan == "Pak")? "selected='selected'" : ''}}>Pak</option>
	                        		<option value="Injeksi" {{ ($row->satuan == "Injeksi")? "selected='selected'" : ''}}>Injeksi</option>
	                        		<option value="Sirup" {{ ($row->satuan == "Sirup")? "selected='selected'" : ''}}>Sirup</option>
	                        		<option value="Salep" {{ ($row->satuan == "Salep")? "selected='selected'" : ''}}>Salep</option>
	                        		<option value="Tetes" {{ ($row->satuan == "Tetes")? "selected='selected'" : ''}}>Tetes</option>
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
	                        	<input type="number" name="persediaan" class="form-control{{ $errors->has('persediaan') ? ' has-error' : '' }}" value="{{ old('persediaan', $row->persediaan) }}">

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
	                        	<input type="number" name="harga_detail" class="form-control{{ $errors->has('harga_detail') ? ' has-error' : '' }}" value="{{ old('harga_detail', $row->harga_detail) }}">

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
