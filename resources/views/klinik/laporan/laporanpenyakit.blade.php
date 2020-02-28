@extends('klinik.layouts.app')
@section('title', 'Data 10 Besar Penyakit Klinik')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Laporan 10 Besar Penyakit Klinik</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/penyakit') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Tanggal Awal</label> 
	                <div class="col-md-6">
	                    <input type="date" class="form-control" name="start"  value="{{ old('start', date('Y-m-d', strtotime($from))) }}">
	                </div> 
	            </div>
	            <div class="form-group">
	                <label for="name" class="col-md-4 control-label">Tanggal Akhir</label> 
	                <div class="col-md-6">
	                    <input type="date" class="form-control" name="end"  value="{{ old('end', date('Y-m-d', strtotime($to))) }}">
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
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>Kode</th> 
	                			<th>Nama Penyakit</th> 
	                			<th>Total</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pemeriksaan_arr as $pemeriksaan)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $pemeriksaan->kode_penyakit }}</td>
	                			<td>{{ $pemeriksaan->nama_penyakit }}</td>
	                			<td>{{ $pemeriksaan->qty }}</td> 
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
