@extends('klinik.layouts.app')
@section('title', 'Resep Obat')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Farmasi | Resep Obat</h3>
	<div class="row"> 
		<div class="col-lg-12 col-md-12 col-sm-12 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('farmasi/obat/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-2 control-label">Cari Pasien</label> 
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
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($pemeriksaan_arr as $pemeriksaan)
	                			 
		                		<tr>
		                			<td>{{++$i}}</td>
		                			<td>{{ 'P0'.$pemeriksaan['id_pemeriksaan'] }}</td> 
		                			<td>{{ $pemeriksaan['tgl_pemeriksaan'] }}</td>
		                			<td>{{ $pemeriksaan['no_rm'] }}</td> 
		                			<td>{{ $pemeriksaan['nama_pasien'] }}</td> 
		                			 
		                			<td>
		                				<a href="obat/edit/{{ $pemeriksaan['id_pemeriksaan'] }}" class="btn btn-danger">
		                					Proses
		                				</a>
		                			</td>
		                		</tr>
			                	 
	                		@endforeach
	                	</tbody>
	                </table> 
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
