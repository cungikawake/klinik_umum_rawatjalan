@extends('klinik.layouts.app')
@section('title', 'Data Transaksi Klinik')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Laporan Transaksi Klinik</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/transaksi') }}">
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
	                					$sudah_dibayar += $pemeriksaan['total_pembayaran'];
	                				}else{
	                					$belum_dibayar += $pemeriksaan['total_pembayaran'];
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
	                <div class="row"> 
	                    <div class="col-md-12 text-right">
	                      <ul class="pagination">
	                         {{ $pemeriksaan_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
