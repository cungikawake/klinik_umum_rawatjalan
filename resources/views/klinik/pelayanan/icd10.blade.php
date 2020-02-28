@extends('klinik.layouts.app')
@section('title', 'Data ICD 10')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | ICD 10</h3>
	<div class="row"> 
		<div class="col-md-6 text-left">
			<form class="form-horizontal" role="form" method="GET" action="{{ url('icd10/do_search') }}">
                {{ csrf_field() }}
				<div class="form-group">
	                <label for="name" class="col-md-4 control-label">Cari</label> 
	                <div class="col-md-6">
	                    <input type="text" class="form-control" name="search" placeholder="Nama" value="{{ old('query') }}">
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
	                			<th>Kode</th> 
	                			<th>Penyakit</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($data_arr as $icd)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $icd['kode_penyakit'] }}</td>
	                			<td>{{ $icd['nama_penyakit'] }}</td>
	                		</tr>
	                		@endforeach
	                	</tbody>
	                </table> 
	                <div class="row"> 
	                    <div class="col-md-12 text-right">
	                      <ul class="pagination">
	                         {{ $data_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
