<!DOCTYPE html>
<html>
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="http://klinikfisioterapimandiri.com/css/app.css" rel="stylesheet"> 
    <!-- Argon CSS -->
    <link href="http://klinikfisioterapimandiri.com/front/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="myFunction()">
	<div class="container">
		<div class="row" style="border-bottom: 2px solid #000;">
			<div class="col-md-3">
				<img src="http://klinikpantiswasti.com/img/logo.png" style="max-height: 100px;">
			</div>
			<div class="col-md-7 text-center">
				<h2>KLINIK PANTI SWASTI</h2>
				<H4>No SIPK. 864/BPPT/KLP/II/2014</H4>
				<P>Jl. Raya Tangeb No. 25, Abianbase, Kec. Mengwi, Kabupaten Badung, Bali 80351</P>
				<p>Telp : (0361) 9006243 , Website : www.klinikpantiswasti.com</p>
			</div>
		</div>
		<br>
		<div class="row"> 
			<div class="col-md-12 text-left">
				<h4>LAPORAN TRANSAKSI KLINIK</h4>
				<p>periode {{ date('d M Y', strtotime($from)) }} s/d {{ date('d M Y', strtotime($to)) }}</p>
				<br>
				<div class="table-responsive">
					<table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>Pemeriksaan</th> 
	                			<th>Tgl Pemeriksaan</th>
	                			<th>No RM</th>
	                            <th>Nama</th>  
	                            <th>Total Tagihan</th>   
	                            <th>Bayar</th>  
	                            <th>Status</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		<?php $total = 0; $sudah_dibayar = 0; $belum_dibayar = 0;?>
	                		@foreach($pemeriksaan_arr as $pemeriksaan)
	                			<?php 
	                				$total += $pemeriksaan['total_pembayaran'];
	                				$bon = $pemeriksaan['sudah_dibayar'] - $pemeriksaan['total_pembayaran'];

	                				if($bon >= 0){
	                					$sudah_dibayar += $pemeriksaan['sudah_dibayar'];
	                				}else{
	                					$belum_dibayar += $pemeriksaan['total_pembayaran'] - $pemeriksaan['sudah_dibayar'];
	                				}
	                					
	                			?> 
		                		<tr>
		                			<td>{{++$i}}</td>
		                			<td>{{ 'P0'.$pemeriksaan['id_pemeriksaan'] }}</td> 
		                			<td>{{ $pemeriksaan['tgl_pemeriksaan'] }}</td>
		                			<td>{{ $pemeriksaan['no_rm'] }}</td> 
		                			<td>{{ $pemeriksaan['nama_pasien'] }}</td> 
		                			<td>Rp.{{ number_format($pemeriksaan['total_pembayaran']) }}</td> 
		                			<td>Rp.{{ number_format($pemeriksaan['sudah_dibayar']) }}</td> 
		                			 
		                			<td>
		                				 
		                				@if($bon < 0)
			                				<div class="alert alert-danger">
			                					Belum Lunas
			                				</div>
			                			@elseif($pemeriksaan['sudah_bayar'] !='')
			                				<div class="alert alert-danger">
			                					Belum Bayar
			                				</div>
			                			
			                			@else
			                				<div class="alert alert-success">
			                					 Lunas
			                				</div> 
			                			@endif
		                			</td>
		                		</tr>
			                	 
	                		@endforeach
	                	</tbody>
	                </table>
	                <div class="col-md-6">
	                	<p>Total Transaksi : Rp.{{number_format($total)}}</p> 
	                	<p>Total Lunas : Rp.{{number_format($sudah_dibayar)}}</p>
	                	<p>Total Belum Lunas : Rp.{{number_format($belum_dibayar)}}</p>
	                </div>
				</div>
			</div>
		</div>
		<br>
		<div class="row"> 
			<div class="col-md-6">
			</div>
			<div class="col-md-6 text-center">
				<h5>Tangeb, {{ date('d M Y')}}</h5>
				<br>
				<br>
				<br>
				( ----------------------------------- )
			</div>
		</div>
	</div>
<script>
function myFunction() {
  window.print();
}
</script>

</body>
</html>
