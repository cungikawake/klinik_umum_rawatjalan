@extends('klinik.layouts.app')
@section('title', 'Data Obat')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Obat</h3>
	<div class="row">
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('obat/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Cari Obat</label> 
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="search" placeholder="Nama Obat" value="{{ old('query') }}">
	                </div>
	                <div class="col-md-2">
	                	<button class="btn btn-danger" style="margin-top: -5px;">Cari</button>
	                </div>
	            </div> 
	        </form>
		</div> 
		<div class="col-md-6 text-right">
			<a href="/obat/register">
				<button class="btn btn-danger">+ Obat Baru</button>
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
	                			<th>Stok</th>
	                			<th>Satuan</th>
	                			<th>Harga</th>
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($obat_arr as $obat)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $obat['nama_obat'] }}</td> 
	                			<td>{{ $obat['persediaan'] }}</td>
	                			<td>{{ $obat['satuan'] }}</td> 
	                			<td>
	                				Umum : Rp.{{ number_format($obat['harga_detail']) }}   
	                			</td> 
	                			 
	                			<td>
	                				<a href="{{ url('obat/edit/'.$obat['id_obat']) }}">
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
