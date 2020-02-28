<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ZF1Yq3TbZrQEGJ63Yo3BMzyNuX8SAqC4D35YnkW0">

    <title>
        Cetak Pembayaran  | klinikfisioterapimandiri.com  
    </title>
    <link rel="icon" type="image/png" href="http://klinikpantiswasti.com/img/logo.png">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="http://klinikpantiswasti.com/css/app.css" rel="stylesheet"> 
    <!-- Argon CSS -->
    <link href="http://klinikpantiswasti.com/front/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://klinikpantiswasti.com/front/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet">
    <link href="http://klinikpantiswasti.com/front/assets/demo/demo.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
 	<style type="text/css">
 		@media print {
		    @page { margin: 0; }
		    body { page-break-after: always; }
		}
 	</style>
	 
</head>
<body  onload="myFunction()">
  <div class="wrapper "> 
    <div class="main-panel" style="background: #fff;">
		<div class="row">
			<div class="col-md-2 text-right">
				<img src="http://klinikpantiswasti.com/img/logo.png" style="max-height: 100px;">
			</div>
			<div class="col-md-10 text-center">
				<h3>KLINIK PANTI SWASTI TANGEB</h3>
				<p>Jl. Raya Tangeb No.25, Abianbase, Kec. Mengwi, Kabupaten Badung, Bali 80351</p>
				<p>Tlp: (0361) 9006243 , Website: www.klinikpantiswasti.com</p>
			</div> 
			<hr>
		</div>
		<hr>
		<div class="content">
			<p><strong>Pasien :</strong></p>
			<p>No RM : {{ $pasien->no_rm }}</p>
			<p>Nama : {{ $pasien->nama_pasien }}</p>
			<p>Jaminan : {{ $pemeriksaan_arr[0]->jaminan }} {{ (!empty($pemeriksaan_arr[0]->no_bpjs))? '('.$pemeriksaan_arr[0]->no_bpjs.')' : ''}}</p>
			<p>Dokter : {{ $pasien->nama }} </p>
			<hr>
			<p><strong>Resep Klinik:</strong></p>
			<table class="table">
				<thead>
					<tr style="text-align: left;">
						<th>  Nama</th>
						<th>  Qty</th>
						<th> Aturan</th> 
						<th>  Harga</th> 
					</tr>
				</thead>
				<tbody>
					<?php $total = 0;?>
					@foreach($pemeriksaan_arr as $pemeriksaan)
			            	@if($pemeriksaan->status_obat == '0') 
			            	<?php $total += $pemeriksaan->harga_obat * $pemeriksaan->qty_obat;?>
							<tr style="text-align: left;">
			            
			            		<td>{{ $pemeriksaan->nama_obat }}</td>	
			            		<td>  {{ $pemeriksaan->qty_obat.' '.$pemeriksaan->satuan }}</td>
			            		<td>  {{ $pemeriksaan->aturan_pakai }}</td> 
			            		<td>  Rp.{{ number_format($pemeriksaan->harga_obat) }}</td> 
			    			</tr>
			    		@endif
			        @endforeach
			        <tr>
			        	<td style="border-top: 1px solid #000; font-size: 20px;">Total :</td>
			        	<td style="border-top: 1px solid #000; font-size: 20px;" colspan="3"> Rp.{{number_format($total)}}</td>
			        </tr>
				</tbody>
			</table>
			<hr>
			<p><strong>Resep Luar:</strong></p>
			<table class="table">
				<thead>
					<tr style="text-align: left;">
						<th>  Nama</th>
						<th>  Qty</th>
						<th>  Aturan</th>  
					</tr>
				</thead>
				<tbody>
					 
					@foreach($pemeriksaan_arr as $pemeriksaan)
			            	@if($pemeriksaan->status_obat == '1')  
							<tr style="text-align: left;"> 
			            		<td>{{ $pemeriksaan->nama_obat }}</td>	
			            		<td>  {{ $pemeriksaan->qty_obat.' '.$pemeriksaan->satuan }}</td>
			            		<td>  {{ $pemeriksaan->aturan_pakai }}</td>  
			    			</tr>
			    		@endif
			        @endforeach 
				</tbody>
			</table>
			<hr style="border-top:2px solid;">
			<p>Tangeb, {{ date('d M Y') }}</p>
			<p><strong>Penerima</strong></p>
			<br>
			<br>
			<br>
			<p>(___________)</p>
		</div>
	</div>
</div>
</body>
<script>
function myFunction() {
  window.print();
}
</script>
</html>