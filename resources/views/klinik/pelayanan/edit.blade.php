@extends('klinik.layouts.app')
@section('title', 'Edit Pelayanan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pelayanan | Edit Pelayanan</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('pelayanan/edit_register') }}">
                        {{ csrf_field() }}

                    <input type="hidden" name="id_pelayanan" value="{{ $row->id_pelayanan }}">

	              	<div class="card-body ">
              	
	                    <div class="form-group{{ $errors->has('nama_pelayanan') ? ' has-error' : '' }}">
	                        <label for="nama_pelayanan" class="col-md-4 control-label">Nama Pelayanan</label>

	                        <div class="col-md-6">
	                            <input id="nama_pelayanan" type="text" class="form-control" name="nama_pelayanan" value="{{ old('nama_pelayanan', $row->nama_pelayanan) }}" required autofocus>

	                            @if ($errors->has('nama_pelayanan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama_pelayanan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 

	                    <div class="form-group{{ $errors->has('nama_pelayanan') ? ' has-error' : '' }}">
	                        <label for="nama_pelayanan" class="col-md-4 control-label">Jenis</label>

	                        <div class="col-md-6">
		                        <textarea class="form-control{{ $errors->has('jenis_pelayanan') ? ' has-error' : '' }}" rows="5" cols="80" name="jenis_pelayanan" required autofocus id="textarea1">
		                        	{{ old('jenis_pelayanan', $row->jenis_pelayanan) }}
		                        </textarea>
	                            
	                            @if ($errors->has('jenis_pelayanan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jenis_pelayanan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
 

	                    <div class="form-group{{ $errors->has('tarif_pelayanan') ? ' has-error' : '' }}">
	                        <label for="tarif_pelayanan" class="col-md-4 control-label">Tarif</label>

	                        <div class="col-md-6">
	                            <input id="tarif_pelayanan" type="number" class="form-control" name="tarif_pelayanan" value="{{ old('tarif_pelayanan', $row->tarif_pelayanan) }}" required autofocus placeholder="contoh : 100000">

	                            @if ($errors->has('tarif_pelayanan'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tarif_pelayanan') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('pelayanan') }}">
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

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		var pane = $('#textarea1');
		pane.val($.trim(pane.val()).replace(/\s*[\r\n]+\s*/g, '\n')
		.replace(/(<[^\/][^>]*>)\s*/g, '$1')
		.replace(/\s*(<\/[^>]+>)/g, '$1'));

		var pane2 = $('#textarea2');
		pane2.val($.trim(pane2.val()).replace(/\s*[\r\n]+\s*/g, '\n')
		.replace(/(<[^\/][^>]*>)\s*/g, '$1')
		.replace(/\s*(<\/[^>]+>)/g, '$1'));
	});
</script>
@stop