@extends('klinik.layouts.app')
@section('title', 'Data Pemakaian Obat')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Laporan | Laporan Pemakaian Obat</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('laporan/obat') }}">
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
	                <div class="row"> 
	                    <div class="col-md-12 text-right">
	                      <ul class="pagination">
	                         {{ $obat_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
