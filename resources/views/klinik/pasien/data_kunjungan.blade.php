@extends('klinik.layouts.app')
@section('title', 'Data Kunjungan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pasien | Data Kunjungan</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('kunjungan/do_search') }}">
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
			<a href="/pasien/register/kunjungan">
				<button class="btn btn-danger">+ Registrasi Kunjungan Baru</button>
			</a> 
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Tanggal Kunjungan</th>
	                			<th>Jaminan</th>
	                			<th>Layanan</th>
	                			<th>Alergi</th>
	                            <th>Status</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td>
	                			<td>{{ date('d M Y', strtotime($pasien['tgl_kunjungan'] )) }}</td>
	                			<td>{{ 
	                				(!empty($pasien['no_bpjs']))? $pasien['jaminan'].' ('.$pasien['no_bpjs'].')' : $pasien['jaminan']
	                			 }}</td>
	                			<td>{{ $pasien['pelayanan'] }}</td>
	                			<td>{{ $pasien['alergi'] }}</td>
	                			<td>
	                				@if($pasien['status_pemeriksaan'] == 1)
	                					<div class="alert alert-warning">
	                						<p>Belum Bayar</p>
	                					</div>
	                				@elseif($pasien['status_pemeriksaan'] == 2)
	                					<div class="alert alert-success">
	                						<p>Sudah diperiksa</p>
	                					</div>
	                				@else
	                					<div class="alert alert-danger">
	                						<p>Belum diperiksa</p>
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
