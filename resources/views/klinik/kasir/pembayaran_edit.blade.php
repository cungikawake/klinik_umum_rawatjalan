@extends('klinik.layouts.app')
@section('title', 'Proses Farmasi')

@section('content')

<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  	<h3>Kasir | Pembayaran</h3>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('kasir/pembayaran/do_register') }}">
	{{ csrf_field() }}

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
          		</div> 
            </div>

            @if(sizeof($pemeriksaan_arr) > 0) 

	            <div class="card">
		            <div class="card-body">
		            	<div class="col-md-12">
	                    	<h3><u>1. Resep Internal</u></h3>
		                    <table class="table">
	                			<thead>
	                				<tr>
	                					<th>Nama</th>
	                					<th>Qty</th>
	                					<th>Aturan Pakai</th>
	                					<th>Pelayanan</th>
	                					<th>Harga</th>
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<?php $total_1 = 0;?>
	                				@foreach($pemeriksaan_arr as $pemeriksaan)
					                    	  	

					                    	@if($pemeriksaan->status_obat == '0') 
					                    	<?php $total_1 += $pemeriksaan->qty_obat * $pemeriksaan->harga_obat; ?>
	                						<tr>
					                    
					                    		<td>{{ $pemeriksaan->nama_obat }}</td>	
					                    		<td>{{ $pemeriksaan->qty_obat.' '.$pemeriksaan->satuan }}</td>
					                    		<td>{{ $pemeriksaan->aturan_pakai }}</td>
					                    		<td>{{ $pemeriksaan->jaminan }} {{ (!empty($pemeriksaan->no_bpjs))? '('.$pemeriksaan->no_bpjs.')' : ''}}</td>
					                    		<td>Rp.{{ number_format($pemeriksaan->harga_obat) }}</td>
				                			</tr>
				                		@endif
					                @endforeach
		                    	</tbody>
	                		</table>

	                		<h3><u>2. Resep External</u></h3>
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

	                		<h3><u>3. Tindakan Dokter</u></h3>
		                    <table class="table">
	                			<thead>
	                				<tr>
	                					<th>Nama</th>
	                					<th>Harga</th>  
	                				</tr>
	                			</thead>
	                			<tbody>
	                				<?php $total_2 = 0;?>
	                				@foreach($tindakan_all as $tindakan)  
	            						<?php $total_2 += $tindakan['harga']; ?>
	            						<tr>
				                    
				                    		<td>{{ $tindakan['nama'] }}</td>	
				                    		<td>Rp.{{ number_format($tindakan['harga']) }}</td>
			                			</tr> 
					                @endforeach
		                    	</tbody>
	                		</table>
		                    <hr>  
	                	</div>
		            </div>		
		        </div>
		        <div class="card">
		        	<div class="card-body">
		        		<div class="col-md-12">
		        			<div class="form-group">
		                    	<h3>Total Pembayaran :</h3>
		                    	<h2>Rp.{{number_format($total_1 + $total_2)}}</h2>
		                    </div>
		                    <div class="form-group">
		                    	<h3>Dibayar :</h3>
		                    	@if(isset($transaksi->sudah_dibayar))
		                    		<h2>Rp.{{ number_format($transaksi->sudah_dibayar) }}</h2>
		                    		<input type="hidden" name="sudah_dibayar" class="sudah_dibayar form-control" placeholder="0" value="{{$transaksi->sudah_dibayar}}">
		                    	@else
		                    		<input type="hidden" name="total_pembayaran" class="total_pembayaran form-control" placeholder="0" value="{{$total_1 + $total_2}}">
		                    		<input type="number" name="sudah_dibayar" class="sudah_dibayar form-control" placeholder="0" required="required">
		                    	@endif
		                    </div>
		                    <div class="form-group">
		                    	<h3>Kembalian :</h3>
		                    	@if(isset($transaksi->sudah_dibayar))
		                    		<h2>Rp.{{ number_format($transaksi->sudah_dibayar - ($total_1 + $total_2)) }}</h2>
		                    	@else
		                    		<h3 class="kembalian">Rp.0</h3>
		                    	@endif
		                    </div>
		                    <hr>
		        		</div>
		        	</div>
		        </div>

		        <div class="card">
		        	<div class="card-footer"> 
		                <div class="stats text-right">
		                	@if(!isset($transaksi->sudah_dibayar)) 
		                		<button class="btn btn-danger" type="submit" id="cetak_resep">Bayar & Cetak</button>
			                @else
			                	<button class="btn btn-danger" type="button" id="cetak_resep">Cetak</button>
			                @endif

			                <a href="{{ url('kasir/pembayaran') }}">
			                    <button class="btn btn-primary" type="button">Batal</button>
			                </a>
		                </div>
	              	</div> 
		        </div>

		    @else
		    	<div class="card">
		        	<div class="card-footer"> 
		                <div class="stats text-center"> 
		                	<h3>Pasien belum diperiksa</h3>
		                </div>
	              	</div> 
		        </div>
		    @endif
        </div>
	</div> 
	</form>    
</div>
@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#cetak_resep').click(function(){
			
			if($('.sudah_dibayar').val() !=''){
				alert('Anda akan mencetak pembayaran');
				var url = "{{(isset($pemeriksaan->id_pemeriksaan))? url('kasir/pembayaran/cetak/'.$pemeriksaan->id_pemeriksaan) : ''}}";
				window.open(url, '_blank');
			}else{
				alert('Pastikan pasien sudah membayar !');
			}
			
		});

		$('.sudah_dibayar').keyup(function(){
			var total_pembayaran = parseFloat($('.total_pembayaran').val());
			var sudah_dibayar = parseFloat($('.sudah_dibayar').val());
			 
			if(sudah_dibayar !=''){ 
				var kembalian = sudah_dibayar - total_pembayaran;

				$('.kembalian').html('Rp.'+number_format(kembalian));
			}else{
				$('.kembalian').html('Rp.0');
			} 

		});
	});

	function number_format (number, decimals, decPoint, thousandsSep) { 
      		 
		  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
		  var n = !isFinite(+number) ? 0 : +number
		  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
		  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
		  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
		  var s = ''

		  var toFixedFix = function (n, prec) {
		    if (('' + n).indexOf('e') === -1) {
		      return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
		    } else {
		      var arr = ('' + n).split('e')
		      var sig = ''
		      if (+arr[1] + prec > 0) {
		        sig = '+'
		      }
		      return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
		    }
		  }

		  // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
		  s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
		  if (s[0].length > 3) {
		    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
		  }
		  if ((s[1] || '').length < prec) {
		    s[1] = s[1] || ''
		    s[1] += new Array(prec - s[1].length + 1).join('0')
		  }

		  return s.join(dec)
	}
</script>
@endsection