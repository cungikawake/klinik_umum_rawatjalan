@extends('klinik.layouts.app')
@section('title', 'All Transaksi') 

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pembayaran | Data Pembayaran</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('transaksi/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Cari Pasien</label> 
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="search" placeholder="No RM / Nama" value="{{ old('query') }}">
	                </div>
	                <div class="col-md-2">
	                	<button class="btn btn-danger" style="margin-top: -5px;">Cari</button>
	                	 
	                </div>
	            </div> 
	        </form>
		</div>
		<div class="col-md-6 text-right">
			 
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr> 
	                			<th>Nota</th> 
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Tanggal Kunjungan</th>
	                			<th>Tanggal Periksa</th>
	                			<th>Layanan</th>
	                			<th>Tarif</th>
	                            <th>Status</th> 
	                            <th>Tool</th> 
	                		</tr> 
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>{{ $pasien['id_transaksi'] }}</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['created_at'] )) }}
	                			</td>
	                			<td>
	                				{{ date('d M Y H:i:s', strtotime($pasien['tgl_terapi'] )) }}
	                			</td>
	                			<td>{{ $pasien['nama_pelayanan'] }}</td>
	                			<td>Rp.{{ number_format($pasien['total_harga']) }}</td>
	                			<td>
	                				@if($pasien['status_transaksi'] == 1)
	                					<div class="alert alert-success">
	                						<p><i class="fa fa-check-square-o"></i> Lunas</p>
	                					</div>
	                				@else
	                					<div class="alert alert-danger">
	                						<p><i class="fa fa-child"></i> Belum dibayar</p>
	                					</div>
	                				@endif
	                			</td>
	                			<td>
	                				@if(Auth::user()->level == '1' || Auth::user()->level == '2' || Auth::user()->level == '3')
	                					<a href="{{ url('transaksi/edit/'.$pasien['id_transaksi']) }}">
	                						<button class="btn btn-success" type="button" style="margin-top: -8px;"><i class="fa fa-money"></i> Proses</button>
	                					</a>
	                				@endif
	                			</td> 
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
