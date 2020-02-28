@extends('klinik.layouts.app')
@section('title', 'Proses Farmasi')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Farmasi | Proses Farmasi</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('farmasi/obat/do_edit') }}">
                        {{ csrf_field() }}

                    <div class="card-body"> 
                    	<div class="col-md-12">
                    		<h3>Data Pasien ({{ $pasien->no_rm}})</h3>
                    		
                    		<input type="hidden" name="id_pemeriksaan" value="{{ $pasien->id_pemeriksaan}}">

                    		<div class="col-md-4">
                    			<div class="form-group">
	                    			<label>Nama</label>
	                    			<p>{{ $pasien->nama_pasien}}</p>
	                    		</div>
	                    		<div class="form-group">
	                    			<label>Umur</label>
	                    			<p>{{ $pasien->umur}}</p>
	                    		</div>	
                    		</div>
                    		<div class="col-md-4">
                    			<div class="form-group">
	                    			<label>Tempat, Tanggal Lahir</label>
	                    			<p>{{ $pasien->tempat_lahir.', '.$pasien->tgl_lahir_pasien }}</p>
	                    		</div>
	                    		<div class="form-group">
	                    			<label>Alamat</label>
	                    			<p>{{ $pasien->alamat_jalan.','.$pasien->alamat_kecamatan.','.$pasien->alamat_kabupaten}}</p>
	                    		</div>
                    		</div>
                    		<div class="col-md-4">
                    			<div class="form-group">
	                    			<label>Jenis Kelamin</label>
	                    			<p>{{ $pasien->jenis_kelamin_pasien }}</p>
	                    		</div>
	                    		<div class="form-group">
	                    			<label>Pekerjaan</label>
	                    			<p>{{ $pasien->pekerjaan }}</p>
	                    		</div>
                    		</div> 
                    		
                    	</div>
                    	<div class="col-md-12">
	                    	<h3>Resep Internal</h3>
		                    <table class="table">
                    			<thead>
                    				<tr>
                    					<th>Nama</th>
                    					<th>Qty</th>
                    					<th>Aturan Pakai</th>
                    					<th>Pelayanan</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				@foreach($pemeriksaan_arr as $pemeriksaan)
					                    	@if($pemeriksaan->status_obat == '0') 
                    						<tr>
					                    
					                    		<td>{{ $pemeriksaan->nama_obat }}</td>	
					                    		<td>{{ $pemeriksaan->qty_obat.' '.$pemeriksaan->satuan }}</td>
					                    		<td>{{ $pemeriksaan->aturan_pakai }}</td>
					                    		<td>{{ $pemeriksaan->jaminan }} {{ (!empty($pemeriksaan->no_bpjs))? '('.$pemeriksaan->no_bpjs.')' : ''}}</td>
				                			</tr>
				                		@endif
					                @endforeach
		                    	</tbody>
                    		</table>

                    		<h3>Resep External</h3>
		                    <table class="table">
                    			<thead>
                    				<tr>
                    					<th>Nama</th>
                    					<th>Qty</th>
                    					<th>Aturan Pakai</th>
                    					<th>Pelayanan</th>
                    				</tr>
                    			</thead>
                    			<tbody>
                    				@foreach($pemeriksaan_arr as $pemeriksaan)
					                    	@if($pemeriksaan->status_obat == '1') 
                    						<tr>
					                    
					                    		<td>{{ $pemeriksaan->nama_obat }}</td>	
					                    		<td>{{ $pemeriksaan->qty_obat.' '.$pemeriksaan->satuan }}</td>
					                    		<td>{{ $pemeriksaan->aturan_pakai }}</td>
					                    		<td>{{ $pemeriksaan->jaminan }} {{ (!empty($pemeriksaan->no_bpjs))? '('.$pemeriksaan->no_bpjs.')' : ''}}</td>
				                			</tr>
				                		@endif
					                @endforeach
		                    	</tbody>
                    		</table>
		                    <hr> 
	                	</div>
              		</div>
	              	<div class="card-footer"> 
		                <div class="stats text-right">
		                	 
		                	<button class="btn btn-danger" type="submit" id="cetak_resep">Cetak</button>
			                
			                <a href="{{ url('farmasi/obat') }}">
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
		$('#cetak_resep').click(function(){
			alert('Anda akan mencetak resep');

			var url = "{{url('farmasi/obat/cetak_resep/'.$pemeriksaan->id_pemeriksaan)}}";
			window.open(url, '_blank');
		});
	});
</script>
@endsection