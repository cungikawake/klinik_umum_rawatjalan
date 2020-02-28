@extends('klinik.layouts.app')
@section('title', 'All Fisioterapi') 

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Data Transaksi</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/transaksi/do_search') }}">
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
            	<h4>Laporan Transaksi</h4>
            	<p>{{ date('d M Y', strtotime($from)) }} s/d {{ date('d M Y', strtotime($to)) }}</p>
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr> 
	                			<th>No Nota</th> 
	                			<th>Tanggal Kunjungan</th>
	                			<th>Tanggal Periksa</th>
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Layanan</th>
	                			<th>Tarif</th> 
	                			<th>Status</th> 
	                		</tr> 
	                	</thead>
	                	<tbody>
	                		<?php 
	                			$total = 0;
	                			$lunas = 0;
	                			$belum_lunas = 0;
	                		?>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>#{{ $pasien['id_transaksi'] }}</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['created_at'] )) }}
	                			</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['tgl_terapi'] )) }}
	                			</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td> 
	                			<td>{{ $pasien['nama_pelayanan'] }}</td> 
	                			<td>Rp.{{ number_format($pasien['tarif_pelayanan']) }}</td> 
	                			<td>@if($pasien['status_transaksi'] == 1)
	                					<div class="alert alert-success">
	                						<p><i class="fa fa-check-square-o"></i> Lunas</p>
	                					</div>
	                				@else
	                					<div class="alert alert-danger">
	                						<p><i class="fa fa-child"></i> Belum dibayar</p>
	                					</div>
	                				@endif</td> 
	                		</tr>
	                		<?php 
	                			if($pasien['status_transaksi'] == 1){
	                				$lunas += $pasien['tarif_pelayanan'];
	                			}else{
	                				$belum_lunas += $pasien['tarif_pelayanan'];
	                			}

	                			$total += $pasien['tarif_pelayanan'];
	                		?>
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
	                <hr>
	                <h4>Total Transaksi : Rp.{{ number_format($total) }}</h4>
	                <h4>Lunas : Rp.{{ number_format($lunas) }}</h4>
	                <h4>Belum Lunas : Rp.{{ number_format($belum_lunas) }}</h4>

	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
