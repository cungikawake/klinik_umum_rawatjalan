@extends('klinik.layouts.app')
@section('title', 'Create Fisioterapi')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Master Data | Petugas Fisioterapi</h3>
	<div class="row"> 
		<div class="col-md-12 text-right">
			<a href="/fisioterapi/register">
				<button class="btn btn-danger">+ Fisioterapi Baru</button>
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
	                			<th>SIPF</th> 
	                			<th>JK</th>
	                			<th>Alamat</th>
	                            <th>No Hp</th>
	                            <th>Tahun Kerja</th> 
	                            <th>Lama Kerja</th> 
	                            <th>Tool</th> 
	                		</tr>
	                	</thead>
	                	<tbody>
	                		@foreach($petugas_arr as $petugas)
	                		<tr>
	                			<td>{{++$i}}</td>
	                			<td>{{ $petugas['nama'] }}</td>
	                			<td>{{ $petugas['sipf'] }}</td>
	                			<td>{{ $petugas['jenis_kelamin'] }}</td>
	                			<td>{{ $petugas['alamat'] }}</td> 
	                			<td>{{ $petugas['no_hp'] }}</td>
	                			<td>{{ $petugas['tahun_mulai_kerja'] }}</td>
	                			<td>
	                				<?php 
	                					$dbDate = \Carbon\Carbon::parse($petugas['tahun_mulai_kerja'].'-01-31');
        								$new =   \Carbon\Carbon::now()->diffInYears($dbDate);
	                				?>
	                				{{ $new.' Tahun' }}</td>
	                			<td>
	                				<a href="fisioterapi/edit/{{ $petugas['id_fisioterapi'] }}">
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
	                         {{ $petugas_arr->links() }}
	                      </ul>
	                    </div>
	                </div>
	            </div>
            </div>
        </div>
	</div>     
</div>
@stop
