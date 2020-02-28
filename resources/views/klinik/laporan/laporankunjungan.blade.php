@extends('klinik.layouts.app')
@section('title', 'Data Kunjungan')

@section('content')
<style type="text/css">
	select.form-control:not([size]):not([multiple]){
		height: auto;
	}
</style>
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Laporan Kunjungan Periode {{ $month }}-{{ $year }}</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/kunjungan') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Periode Bulan</label> 
	                <div class="col-md-6">
	                    <select class="form-control" name="month" required="required">
	                    	<option value="">Pilih Bulan</option>
	                    @for($i=1; $i <= 12; $i++)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    @endfor
	                    </select>
	                </div> 
	            </div>
	            <div class="form-group">
	                <label for="name" class="col-md-4 control-label">Tahun</label> 
	                <div class="col-md-6">
	                    <select class="form-control" name="year" required="required">
	                    	<option value="">Pilih Tahun</option>
	                    <?php 
	                    	$y = date('Y'); 
	                    	$min = $y - 5; 
	                    ?>
	                    @for($i=$y; $i >= $min; $i--)
	                    	<option value="{{ $i }}">{{ $i }}</option>
	                    @endfor
	                    </select>
	                </div>  
	            </div> 
	            <div class="form-group">
	            	<label for="name" class="col-md-4 control-label">Pilih</label>
	            	<div class="col-md-2">
	            		<button name="cari" value="cari" class="btn btn-danger" style="margin-top: -5px;">Cari</button>
	            	</div>
	            	<div class="col-md-2"> 
	                	<button name="cetak" value="cetak" class="btn btn-success" style="margin-top: -5px;">Cetak</button> 
	                </div>
	            </div>
	        </form>
		</div>

		
 
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
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
	</div>     
</div>
@stop
