<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ZF1Yq3TbZrQEGJ63Yo3BMzyNuX8SAqC4D35YnkW0">

    <title>
        Cetak Pembayaran  | klinikpantiswasti.com  
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
    <!--sidebar-->

    <!--sidebar-->

    <div class="main-panel" style="background: #fff;">
      <!-- Navbar -->
       

      <!--content-->
      <div class="content">
        <div class="row">

<div class="col-lg-12 col-md-12 lf_topics_wrapper">  
	 

	<div class="row">
		<div class="col-md-2 text-right">
			<img src="http://klinikpantiswasti.com/img/logo.png" style="max-height: 100px;">
		</div>
		<div class="col-md-10 text-center">
			<h3>KLINIK PANTI SWASTI TANGEB</h3>
			<p>Jl. Raya Tangeb No.25, Abianbase, Kec. Mengwi, Kabupaten Badung, Bali 80351</p>
			<p>Tlp: (0361) 9006243 , Website: www.klinikpantiswasti.com</p>
		</div> 
		<div class="col-lg-12 col-md-12 col-sm-12">
			<hr> 
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

                		<table class="table">
                			<tr>
                				<td>No RM</td>
                				<td>Nama</td>
                				<td>Alamat</td>
                				<td>Tempat, Tgl Lahir</td>
                				<td>Umur</td>
                				<td>Jenis Kelamin</td>
                				<td>Pekerjaan</td> 
                				<td>Layanan</td>
                				<td>Jaminan</td>
                			</tr>
                			<tr>
                				<td>{{ $pasien->no_rm}}</td>
                				<td>{{ $pasien->nama_pasien}}</td>
                				<td>aaaaaaaaaa aaaaaaaaa {{ $pasien->alamat_jalan.','.$pasien->alamat_kecamatan.','.$pasien->alamat_kabupaten}}</td>
                				<td>{{ $pasien->tempat_lahir.', '.$pasien->tgl_lahir_pasien }}</td>
                				<td>{{ $pasien->umur}}</td>
                				<td>{{ $pasien->jenis_kelamin_pasien }}</td>
                				<td>{{ $pasien->pekerjaan }}</td> 
                				<td>{{ $pasien->pelayanan }}</td>
                				<td>{{ ($pasien->no_bpjs !='')? $pasien->jaminan.' ('.$pasien->no_bpjs.')' : $pasien->jaminan }}</td>  
                			</tr>
                		</table>

                		   
                	</div> 
          		</div> 
            </div>

            @if(sizeof($pemeriksaan_arr) > 0) 

	            <div class="card">
		            <div class="card-body">
		            	<h3>Dokter : {{$pasien->nama}}</h3>
		            	<div class="row">
			            	<div class="col-md-6" style="width: 50%;"> 
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
		                	</div>
		                	<div class="col-md-6" style="width: 50%;">
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
		                	</div>
		                	<div class="col-md-6">
		                		<h3><u>3. Tindakan Dokter </u></h3>
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
		                	</div>
		                	<div class="col-md-6">
		                		<h3><u>4. Pembayaran </u></h3>
			                    <table class="table">
		                			<thead>
		                				<tr>
		                					<th>Total</th>
		                					<th>Bayar</th>  
		                					<th>Kembalian</th>  
		                				</tr>
		                			</thead>
		                			<tbody>
		                				@if(isset($transaksi->sudah_dibayar))
		                				<tr>
		                					<th>Rp.{{number_format($total_1 + $total_2)}}</th>
		                					<th>Rp.{{ number_format($transaksi->sudah_dibayar) }}</th>  
		                					<th>Rp.{{ number_format($transaksi->sudah_dibayar - ($total_1 + $total_2)) }}</th>  
		                				</tr>
		                				@else
		                					<tr>
		                						<th>Proses bayar belum selesai.</th>
		                					</tr>
		                				@endif
			                    	</tbody>
		                		</table> 
		                	</div>
		                	<hr>
		                	<div class="col-md-6 text-center">
		                		<p> </p>
		                		<p>Pasien</p>
		                		<br>
		                		<br>
		                		<br>
		                		<br>
		                		<p>(___________)</p>
		                	</div>
		                	<div class="col-md-6 text-center">
		                		<p>Tangeb, {{date('d M Y')}}</p>
		                		<p>Kasir</p>
		                		<br>
		                		<br>
		                		<br>
		                		<p>(___________)</p>
		                	</div>
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
	    
	</div>
   </div>
</div>
      <!--content-->
		<footer class="footer footer-black  footer-white ">
	        <div class="container-fluid">
	          <div class="row">
	            <nav class="footer-nav">
	              <ul>
	                <li>
	                  
	                </li>
	                 
	              </ul>
	            </nav>
	            <div class="credits ml-auto">
	              <span class="copyright">
	                ©
	                <script>
	                  document.write(new Date().getFullYear())
	                </script>, <i class="fa fa-heart heart"></i> by klinikpantiswasti.com 
	              </span>
	            </div>
	          </div>
	        </div>
      	</footer>
    <!--main panel-->
    </div>
  </div>
  <!--wraper-->

<!--   Core JS Files   -->
<script src="http://klinikpantiswasti.com/front/assets/js/core/jquery.min.js"></script>
<script src="http://klinikpantiswasti.com/front/assets/js/core/popper.min.js"></script>
<script src="http://klinikpantiswasti.com/front/assets/js/core/bootstrap.min.js"></script>
<script src="http://klinikpantiswasti.com/front/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
 

<!--  Notifications Plugin    -->
<script src="http://klinikpantiswasti.com/front/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="http://klinikpantiswasti.com/front/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="http://klinikpantiswasti.com/front/assets/demo/demo.js"></script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
  
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
<script type="text/javascript">
	function myFunction() {
	  window.print();
	}

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
 
</body>
</html>