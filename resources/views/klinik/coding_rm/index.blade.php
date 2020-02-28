@extends('klinik.layouts.app')
@section('title', 'Data Coding Rekam Medis')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Rekam Medis | Data Coding Rekam Medis</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('coding_rm/do_search') }}">
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
	                			<th>No</th> 
	                			<th>No RM</th> 
	                			<th>Nama</th>
	                			<th>Tgl Kunjungan</th>
	                			<th>Tgl Periksa</th>
	                			<th>Jaminan</th>
	                			<th>Layanan</th>
	                			<th>Dokter</th> 
	                			<th>ICD 10</th> 
	                            <th>Status</th> 
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td>
	                			<td>{{ date('d M Y H:i:s', strtotime($pasien['tgl_kunjungan'] )) }}</td>
	                			<td>{{ (empty($pasien['tgl_pemeriksaan']))? '': date('d M Y H:i:s', strtotime($pasien['tgl_pemeriksaan'] )) }}</td>
	                			<td>{{ 
	                				(!empty($pasien['no_bpjs']))? $pasien['jaminan'].' ('.$pasien['no_bpjs'].')' : $pasien['jaminan']
	                			 }}</td>
	                			<td>{{ $pasien['pelayanan'] }}</td>
	                			<td>{{ $pasien['nama_dokter'] }}</td>
	                			<td>{{ $pasien['kode_penyakit'].' '.$pasien['nama_penyakit'] }}</td>
	                			<td>
	                				@if($pasien['status_pemeriksaan'] == 1 && $pasien['status_koding'] == 1)
	                					<div class="alert alert-success">
	                						<p>Sudah Dicoding</p>
	                					</div>
	                				@elseif($pasien['status_pemeriksaan'] == 1 && $pasien['status_koding'] == 0)
	                					<div class="alert alert-danger">
	                						<p>Belum Dicoding</p>
	                					</div>
	                				@else
	                					<div class="alert alert-danger">
	                						<p>Belum Diperiksa</p>
	                					</div>
	                				@endif
	                			</td> 
	                			<td>
	                				@if($pasien['status_pemeriksaan'] == 1 && $pasien['status_koding'] == 0)
		                				<a href="coding_rm/proses/{{ $pasien['id_pemeriksaan'] }}" class="btn btn-danger" style="margin-top: -7px;">
		                					Proses Coding
		                				</a>
		                			@elseif($pasien['status_pemeriksaan'] == 1 && $pasien['status_koding'] == 1) 
		                				<a href="coding_rm/edit/{{ $pasien['id_pemeriksaan'] }}" class="btn btn-success" style="margin-top: -7px;">
		                					Edit
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
