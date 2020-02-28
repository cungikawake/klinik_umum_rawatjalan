@extends('klinik.layouts.app')
@section('title', 'Data Tindakan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Tindakan</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('tindakan/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Cari</label> 
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="search" placeholder="Nama Tindakan" value="{{ old('query') }}">
	                </div>
	                <div class="col-md-2">
	                	<button class="btn btn-danger" style="margin-top: -5px;">Cari</button>
	                	 
	                </div>
	            </div> 
	        </form>
		</div>
		<div class="col-md-6 text-right">
			<a href="/tindakan/register">
				<button class="btn btn-danger">+ Tindakan Baru</button>
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
	                			<th>Jenis</th> 
	                            <th>Tarif</th>
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($tindakan_arr as $tindakan)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $tindakan['nama_tindakan'] }}</td>
	                			<td>{{ $tindakan['jenis_tindakan'] }}</td> 
	                			<td>{{ number_format($tindakan['tarif_tindakan']) }}</td> 
	                			<td>
	                				<a href="{{ url('tindakan/edit/'.$tindakan['id_tindakan']) }}">
	                					Edit
	                				</a>
	                			</td>
	                		</tr>
	                		@endforeach
	                	</tbody>
	                </table> 
	                <div class="row"> 
	                    <div class="col-md-12 text-right">
	                      <ul class="pagination">
	                         {{ $tindakan_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
