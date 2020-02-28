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
				<h4>LAPORAN KUNJUNGAN KLINIK </h4>
				<p>PERIODE {{ $month }}-{{ $year }}</p>
				<br>
				<div class="table-responsive">
					<table class="table">
	                	<thead>
	                		<tr>
	                			<th style="border:1px solid #000;">TGL</th> 
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">BP</th> 
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">KB</th>
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">Vac</th>
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">Ph</th>
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">Partus</th>
	                			<th colspan="2" style="text-align: center;border:1px solid #000;">Bpg</th> 
	                		</tr>
	                		<tr style="text-align: center;">
	                			<th style="border:1px solid #000;"></th>
	                			
	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>

	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>

	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>

	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>

	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>

	                			<th style="border:1px solid #000;">U</th> 
	                			<th style="border:1px solid #000;">BPJS</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($reports as $key => $report)
	                		<tr>
	                			<td style="text-align: center; border:1px solid #000;">{{$key}}</td> 
	                			
	                			<td style=" text-align: center;border:1px solid #000;">
	                				@if(isset($report['BP']))
	                					@foreach($report['BP'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach  
	                				@endif
	                			</td>
	                			<td style=" text-align: center;border:1px solid #000;">
	                				@if(isset($report['BP']))
	                					@foreach($report['BP'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>

	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Kb']))
	                					@foreach($report['Kb'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>
	                			<td style=" text-align: center;border:1px solid #000;">
	                				@if(isset($report['Kb']))
	                					@foreach($report['Kb'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>

	                			<td style=" text-align: center;border:1px solid #000;">
	                				@if(isset($report['Vac']))
	                					@foreach($report['Vac'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>
	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Vac']))
	                					@foreach($report['Vac'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>

	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Ph']))
	                					@foreach($report['Ph'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>
	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Ph']))
	                					@foreach($report['Ph'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>

	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Partus']))
	                					@foreach($report['Partus'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>
	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Partus']))
	                					@foreach($report['Partus'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>

	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Bpg']))
	                					@foreach($report['Bpg'] as $value)
	                						@if($value->jaminan =='UMUM')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
	                				@endif
	                			</td>
	                			<td style="text-align: center; border:1px solid #000;">
	                				@if(isset($report['Bpg']))
	                					@foreach($report['Bpg'] as $value)
	                						@if($value->jaminan =='BPJS')
	                							{{ $value->qty }}
	                						@endif
	                					@endforeach
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
