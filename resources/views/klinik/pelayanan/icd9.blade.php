@extends('klinik.layouts.app')
@section('title', 'Data ICD 9')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | ICD 9</h3>
	<div class="row"> 
		<div class="col-lg-12 col-md-12 col-sm-12"> 
            <div class="card card-stats">
              	<div class="table-responsive">
	                <table class="table">
	                	<thead>
	                		<tr>
	                			<th>No</th> 
	                			<th>Kode</th> 
	                			<th>Tindakan</th>
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($data_arr as $icd)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $icd['kode_tindakan'] }}</td>
	                			<td>{{ $icd['nama_tindakan'] }}</td>
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
