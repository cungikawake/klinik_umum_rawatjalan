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
				<h4>LAPORAN OBAT KELUAR KLINIK</h4>
				<p>periode {{ date('d M Y', strtotime($from)) }} s/d {{ date('d M Y', strtotime($to)) }}</p>
				<br>
				<div class="table-responsive">
					<table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>No Pemeriksaan</th> 
	                			<th>Nama Obat</th> 
	                			<th>Qty Keluar</th>
	                			<th>Harga</th>
	                			<th>Total</th> 
	                			<th>Tgl Keluar</th> 
	                            <th>Status</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($obat_arr as $obat)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>P0{{ $obat['id_pemeriksaan'] }}</td>
	                			<td>{{ $obat['nama_obat'] }}</td>
	                			<td>{{ $obat['qty_obat'].$obat['satuan'] }}</td>
	                			<td>Rp.{{ number_format($obat['harga_obat']).'/'.$obat['satuan'] }}</td>
	                			<td>Rp.{{ number_format($obat['harga_obat'] * $obat['qty_obat']) }}</td>
	                			<td>{{ date('d M Y H:i:s', strtotime($obat['updated_at'] )) }}</td> 
	                			<td>
	                				@if($obat['status_obat'] == 1)
	                					<div class="alert alert-success">
	                						<p>Sudah diambil</p>
	                					</div> 
	                				@else
	                					<div class="alert alert-danger">
	                						<p>Belum diambil</p>
	                					</div>
	                				@endif
	                			</td> 
	                			 
	                		</tr>
	                		@endforeach
	                	</tbody>
	                </table>
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
