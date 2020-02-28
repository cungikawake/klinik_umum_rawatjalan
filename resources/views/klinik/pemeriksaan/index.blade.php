@extends('klinik.layouts.app')
@section('title', 'Data Pemeriksaan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pasien | Data Pemeriksaan</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('pemeriksaan/do_search') }}">
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
	                			<th>No Pemeriksaan</th> 
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Tgl Kunjungan</th>
	                			<th>Tgl Periksa</th>
	                			<th>Jaminan</th>
	                			<th>Layanan</th>
	                			<th>Dokter</th> 
	                            <th>Status</th> 
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>P0{{ $pasien['id_pemeriksaan'] }}</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td>
	                			<td>{{ date('d M Y', strtotime($pasien['tgl_kunjungan'])) }}</td>
	                			<td>{{ (empty($pasien['tgl_pemeriksaan']))? '': date('d M Y H:i:s', strtotime($pasien['tgl_pemeriksaan'] )) }}</td>
	                			<td>{{ 
	                				(!empty($pasien['no_bpjs']))? $pasien['jaminan'].' ('.$pasien['no_bpjs'].')' : $pasien['jaminan']
	                			 }}</td>
	                			<td>{{ $pasien['pelayanan'] }}</td>
	                			<td>{{ $pasien['nama_dokter'] }}</td>
	                			<td>
	                				@if($pasien['status_pemeriksaan'] == 1)
	                					<div class="alert alert-success">
	                						<p>Sudah diperiksa</p>
	                					</div>
	                				@elseif($pasien['status_pemeriksaan'] == 2)
	                					<div class="alert alert-success">
	                						<p>Sudah Bayar</p>
	                					</div>
	                				@else
	                					<div class="alert alert-danger">
	                						<p>Belum diperiksa</p>
	                					</div>
	                				@endif
	                			</td> 
	                			<td>
	                				@if($pasien['status_pemeriksaan'] == 0)
		                				<a href="pemeriksaan/edit/{{ $pasien['id_pemeriksaan'] }}" class="btn btn-danger" style="margin-top: -7px;">
		                					Proses
		                				</a>
	                				@else
	                					<a href="pemeriksaan/detail/{{ $pasien['id_pemeriksaan'] }}" class="btn btn-danger" style="margin-top: -7px;">
		                					Detail
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
