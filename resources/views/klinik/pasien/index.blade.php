@extends('klinik.layouts.app')
@section('title', 'Data Pasien')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pasien | Data Pasien</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('pasien/do_search') }}">
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
			 
			<a href="/pasien/register">
				<button class="btn btn-danger">+ Pasien Baru</button>
			</a>
			 
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>Nama</th> 
	                			<th>No RM</th> 
	                			<th>JK</th>
	                			<th>Alamat</th>
	                			<th>Tempat Lahir</th>
	                			<th>Tgl Lahir</th>
	                			<th>No Hp</th>
	                			<th>Umur</th>
	                			<th>Pekerjaan</th>
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pasien_arr as $pasien)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $pasien['nama_pasien'] }}</td>
	                			<td>{{ $pasien['no_rm'] }}</td>
	                			<td>{{ $pasien['jenis_kelamin_pasien'] }}</td>
	                			<td>{{ $pasien['alamat_jalan'].', '.$pasien['alamat_kecamatan'].', '.$pasien['alamat_kabupaten'] }}</td> 
	                			<td>{{ $pasien['tempat_lahir'] }}</td> 
	                			<td>{{ $pasien['tgl_lahir_pasien'] }}</td> 
	                			<td>{{ $pasien['no_hp_pasien'] }}</td>
	                			<td>{{ $pasien['umur'] }}</td> 
	                			<td>{{ $pasien['pekerjaan'] }}</td> 
	                			<td>
	                				@if(Auth::user()->level == '1' || Auth::user()->level == '2')
	                				<a href="pasien/edit/{{ $pasien['id_pasien'] }}">
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
