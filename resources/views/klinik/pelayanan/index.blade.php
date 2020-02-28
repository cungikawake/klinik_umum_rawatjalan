@extends('klinik.layouts.app')
@section('title', 'Pelayanan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Pelayanan</h3>
	<div class="row"> 
		<div class="col-md-12 text-right">
			<a href="/pelayanan/register">
				<button class="btn btn-danger">+ Pelayanan Baru</button>
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
	                		@foreach($pelayanan_arr as $pelayanan)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $pelayanan['nama_pelayanan'] }}</td>
	                			<td>{{ $pelayanan['jenis_pelayanan'] }}</td> 
	                			<td>{{ number_format($pelayanan['tarif_pelayanan']) }}</td> 
	                			<td>
	                				<a href="pelayanan/edit/{{ $pelayanan['id_pelayanan'] }}">
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
	                         {{ $pelayanan_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
