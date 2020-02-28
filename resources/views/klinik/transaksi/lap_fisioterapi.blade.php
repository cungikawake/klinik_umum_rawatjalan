@extends('klinik.layouts.app')
@section('title', 'All Fisioterapi') 

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Data Fisioterapi</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/fisioterapi/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Tanggal Awal</label> 
	                <div class="col-md-6">
	                    <input type="date" class="form-control" name="start"  value="{{ old('start', $from) }}">
	                </div> 
	            </div>
	            <div class="form-group">
	                <label for="name" class="col-md-4 control-label">Tanggal Akhir</label> 
	                <div class="col-md-6">
	                    <input type="date" class="form-control" name="end"  value="{{ old('end', $to) }}">
	                </div>  
	            </div> 
	            <div class="form-group">
	            	<div class="col-md-2">
	            		<button name="cari" value="cari" class="btn btn-danger" style="margin-top: -5px;">Cari</button>
	            	</div>
	            	<div class="col-md-2"> 
	                	<button name="cetak" value="cetak" class="btn btn-success" style="margin-top: -5px;">Cetak</button> 
	                </div>
	            </div>
	        </form>
		</div>
		<div class="col-md-6 text-right">
			 
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats" style="padding-left: 10px; padding-right: 10px;">
            	<h4>Laporan Pelayanan Fisioterapi</h4>
            	<p>{{ date('d M Y', strtotime($from)) }} s/d {{ date('d M Y', strtotime($to)) }}</p>
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
	                <div class="row"> 
	                    <div class="col-md-12 text-right">
	                      <ul class="pagination">
	                         {{ $pasien_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
