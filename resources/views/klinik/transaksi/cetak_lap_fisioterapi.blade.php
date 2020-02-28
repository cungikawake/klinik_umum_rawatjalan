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
		<div class="row">
			<div class="col-md-3">
				<img src="http://klinikfisioterapimandiri.com/assets/images/logo%20klinik.png" style="max-height: 100px;">
			</div>
			<div class="col-md-9 text-center">
				<h2>KLINIK FISIOTERAPI MANDIRI</h2>
				<H4>SIPF : 503/FS-002/102/III/2016</H4>
				<P>JL P.Suryanata RT 33 RW 7 No.5 Kel Air Putih Kec.Samarinda Ulu Kodya Samarinda Kalimantan Timur</P>
				<p>Hp 0813 4746 4682 / 0852 4837 2782</p>
			</div>
		</div>
		<br>
		<div class="row"> 
			<div class="col-md-12 text-left">
				<h4>LAPORAN PELAYANAN FISIOTERAPI</h4>
				<p>{{ date('d M Y', strtotime($from)) }} s/d {{ date('d M Y', strtotime($to)) }}</p>
				<br>
				<div class="table-responsive">
					<table class="table">
	                	<thead>
	                		<tr> 
	                			<th>No</th> 
	                			<th>Tanggal Kunjungan</th>
	                			<th>Tanggal Periksa</th>
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Diagnosa</th>
	                			<th>Fisioterapis</th> 
	                		</tr> 
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['created_at'] )) }}
	                			</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['tgl_terapi'] )) }}
	                			</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td> 
	                			<td>{{ $pasien['diagnosa_fisioterapi'] }}</td> 
	                			<td>{{ $pasien['nama_fisioterapi'] }}</td> 
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
				<h5>Samarinda, {{ date('d M Y')}}</h5>
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
