@extends('klinik.layouts.app')
@section('title', 'Proses Transaksi') 

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pembayaran | Proses Pembayaran | No Nota : #{{$pasien_arr->id_transaksi}}</h3>
	<div class="row">
		@if(session('success'))
			<div class="alert alert-success">
				{{session('success')}}
			</div>
		@elseif(session('error'))
			<div class="alert alert-danger">
				{{session('error')}}
			</div>
		@endif

		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
              	<div class="card-body">
              		<h3>Data Pasien</h3>
              		<hr>
              		<div class="row">
              			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<input id="id_assesment" type="hidden" class="form-control" name="id_assesment" value="{{ old('id_assesment',  (isset($pasien_arr->id_assesment)? $pasien_arr->id_assesment: '')) }}" readonly="readonly"> 

	                        	<label for="name" class="control-label">No. RM</label>
	                            <input id="no_rm_pasien" type="text" class="form-control" name="no_rm" value="{{ old('no_rm', (isset($pasien_arr->no_rm))? $pasien_arr->no_rm: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">Tgl Kunjungan</label>
	                            <input id="created_at" type="text" class="form-control" name="created_at" value="{{ old('created_at', (isset($pasien_arr->created_at))? $pasien_arr->created_at: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Nama</label>
	                            <input id="nama_pasien" type="text" class="form-control" name="nama_pasien" value="{{ old('nama_pasien', (isset($pasien_arr->nama_pasien))? $pasien_arr->nama_pasien: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">No Hp</label>
	                            <input id="no_hp_pasien" type="text" class="form-control" name="no_hp_pasien" value="{{ old('no_hp_pasien', (isset($pasien_arr->no_hp_pasien))? $pasien_arr->no_hp_pasien: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Tgl Lahir</label>
	                            <input id="tgl_lahir_pasien" type="text" class="form-control" name="tgl_lahir_pasien" value="{{ old('tgl_lahir_pasien', (isset($pasien_arr->tgl_lahir_pasien))? $pasien_arr->tgl_lahir_pasien: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">Jenis Kelamin</label>
	                            <input id="jenis_kelamin_pasien" type="text" class="form-control" name="jenis_kelamin_pasien" value="{{ old('jenis_kelamin_pasien', (isset($pasien_arr->jenis_kelamin_pasien))? $pasien_arr->jenis_kelamin_pasien: '') }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Alamat</label>
	                            <input id="alamat_pasien" type="text" class="form-control" name="alamat_pasien" value="{{ old('alamat_pasien', (isset($pasien_arr->alamat_pasien))? $pasien_arr->alamat_pasien: '') }}" autofocus readonly="readonly"> 
	                        </div> 
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Umur</label>
	                            <input id="umur" type="text" class="form-control" name="umur" value="{{ old('umur', (isset($pasien_arr->umur))? $pasien_arr->umur: '') }}" autofocus readonly="readonly"> 
	                        </div> 
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                        <div class="col-md-3">
	                        	<label for="name" class="control-label">Layanan</label>
	                            <p>{{ $pasien_arr->nama_pelayanan }}</p>
	                        </div> 
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Jenis Layanan</label>
	                            <p>{{ $pasien_arr->jenis_pelayanan }}</p>
	                        </div> 
	                        <div class="col-md-3">
	                        	<label for="name" class="control-label">Total Tarif</label>
	                            <p>Rp.{{ number_format($pasien_arr->total_harga) }}</p>
	                        </div>  
	                    </div>

	                    <div class="form-group">
	                    	@if($pasien_arr->status_transaksi == 0)
	                    	<a href="{{ url('transaksi/bayar/'.$pasien_arr->id_transaksi) }}">
	                    		<button type="button" class="btn btn-danger" id="bayar">Bayar</button>
	                    	</a>
	                    	@else
	                    	<a href="{{ url('transaksi/cetak/'.$pasien_arr->id_transaksi) }}" target="_new">
	                    		<button type="button" class="btn btn-danger" id="cetak">Cetak</button>
	                    	</a>
	                    	@endif

	                    	<a href="{{ url('transaksi') }}">
	                    		<button type="button" class="btn btn-default">Keluar</button>
	                    	</a>
	                    </div>
              		</div>
              	</div>
            </div>
        </div>
	</div>     
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#bayar').click(function(){
			var txt;
			var r = confirm("Yakin untuk membayar ?");
			
			if (r == true) {
			  return true;
			} else {
			  return false;
			}	
		});
		
	});
</script>
@endsection