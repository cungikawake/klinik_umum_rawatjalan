@extends('klinik.layouts.app')
@section('title', 'Edit Assesment')

@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
	.form-horizontal .form-group{
		margin-left: 0px;
		margin-right: 0px;
	}
	select.form-control:not([size]):not([multiple]){
		height: 40px;
	}
</style>

<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Assesment | Update Assesment</h3>
	<div class="row"> 
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('assesment/do_create') }}">
                        {{ csrf_field() }} 
	              	<div class="card-body "> 
	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<input id="id_assesment" type="hidden" class="form-control" name="id_assesment" value="{{ old('id_assesment', $pasien_arr->id_assesment) }}" readonly="readonly"> 

	                        	<label for="name" class="control-label">No. RM</label>
	                            <input id="no_rm_pasien" type="text" class="form-control" name="no_rm" value="{{ old('no_rm', $pasien_arr->no_rm) }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">Tgl Kunjungan</label>
	                            <input id="tgl_terapi" type="text" class="form-control" name="tgl_terapi" value="{{ old('tgl_terapi', $pasien_arr->created_at) }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Nama</label>
	                            <input id="nama_pasien" type="text" class="form-control" name="nama_pasien" value="{{ old('nama_pasien', $pasien_arr->nama_pasien) }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">No Hp</label>
	                            <input id="no_hp_pasien" type="text" class="form-control" name="no_hp_pasien" value="{{ old('no_hp_pasien', $pasien_arr->no_hp_pasien) }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Tgl Lahir</label>
	                            <input id="tgl_lahir_pasien" type="text" class="form-control" name="tgl_lahir_pasien" value="{{ old('tgl_lahir_pasien', $pasien_arr->tgl_lahir_pasien) }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">Jenis Kelamin</label>
	                            <input id="jenis_kelamin_pasien" type="text" class="form-control" name="jenis_kelamin_pasien" value="{{ old('jenis_kelamin_pasien', $pasien_arr->jenis_kelamin_pasien) }}" autofocus readonly="readonly"> 
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Alamat</label>
	                            <input id="alamat_pasien" type="text" class="form-control" name="alamat_pasien" value="{{ old('alamat_pasien', $pasien_arr->alamat_pasien) }}" autofocus readonly="readonly"> 
	                        </div> 
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Umur</label>
	                            <input id="umur" type="text" class="form-control" name="umur" value="{{ old('umur', $pasien_arr->umur) }}" autofocus readonly="readonly"> 
	                        </div> 
	                    </div>
	                   
              		<hr>
              		 
              			<div class="col-md-6">
              				<div class="form-group {{ $errors->has('keluhan') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Keluhan</label>
		                        <input id="keluhan" type="text" class="form-control" name="keluhan" value="{{ old('keluhan', $assesment->keluhan) }}" autofocus > 
		                    </div>
		                    <div class="form-group {{ $errors->has('riwayat_keluhan') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Riwayat Keluhan</label>
		                        <input id="riwayat_keluhan" type="text" class="form-control" name="riwayat_keluhan" value="{{ old('riwayat_keluhan', $assesment->riwayat_keluhan) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('inspeksi_statis') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Inspeksi Statis</label>
		                        <select class="form-control" name="inspeksi_statis">
		                        	<option value="Alat Bantu" {{ ($assesment->inspeksi_statis == 'Alat Bantu')? 'selected="selected"' : '' }}> Alat Bantu</option>
		                        	<option value="Deformitas" {{ ($assesment->inspeksi_statis == 'Deformitas')? 'selected="selected"' : '' }}> Deformitas</option>
		                        	<option value="Lain - Lain" {{ ($assesment->inspeksi_statis == 'Lain - Lain')? 'selected="selected"' : '' }}> Lain - Lain</option>
		                        </select>
		                    </div>
		                    <div class="form-group {{ $errors->has('inspeksi_dinamis') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Inspeksi Dinamis</label>
		                        <input id="inspeksi_dinamis" type="text" class="form-control" name="inspeksi_dinamis" value="{{ old('inspeksi_dinamis', $assesment->inspeksi_dinamis) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('keterbatasan_gerakan') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Keterbatasan Gerakan</label>
		                        <input id="keterbatasan_gerakan" type="text" class="form-control" name="keterbatasan_gerakan" value="{{ old('keterbatasan_gerakan', $assesment->keterbatasan_gerakan) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('tissue_impairment') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Tissue Impairment</label>
		                        <input id="tissue_impairment" type="text" class="form-control" name="tissue_impairment" value="{{ old('tissue_impairment', $assesment->tissue_impairment) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('pemeriksaan_spesifik') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Pemeriksaan Spesifik</label>
		                        <input id="pemeriksaan_spesifik" type="text" class="form-control" name="pemeriksaan_spesifik" value="{{ old('pemeriksaan_spesifik', $assesment->pemeriksaan_spesifik) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('problem_fisioterapi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Problem Fisioterapi</label>
		                        <input id="problem_fisioterapi" type="text" class="form-control" name="problem_fisioterapi" value="{{ old('problem_fisioterapi', $assesment->problem_fisioterapi) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('activity_limitations') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Activity Limitation</label>
		                        <input id="activity_limitations" type="text" class="form-control" name="activity_limitations" value="{{ old('activity_limitations', $assesment->activity_limitations) }}" autofocus> 
		                    </div>
		                    <div class="form-group {{ $errors->has('participation_restriction') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Participation Restriction</label>
		                       <input id="participation_restriction" type="text" class="form-control" name="participation_restriction" value="{{ old('participation_restriction', $assesment->participation_restriction) }}" autofocus> 
		                    </div>
		                    
              			</div>

              			<div class="col-md-6">
              				<div class="form-group{{ $errors->has('diagnosa_fisioterapi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Diagnosa Fisiotarapi</label>
		                       <input type="text" class="form-control" name="diagnosa_fisioterapi" id="diagnosa_fisioterapi" placeholder="Cari ICD-10" value="{{ old('diagnosa_fisioterapi', $assesment->diagnosa_fisioterapi) }}">
		                    </div>
		                    <div class="form-group{{ $errors->has('tindakan_fisioterapi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Tindakan Fisiotarapi</label>
		                       <input type="text" class="form-control" name="tindakan_fisioterapi" id="tindakan_fisioterapi" placeholder="Cari ICD-9" value="{{ old('tindakan_fisioterapi', $assesment->tindakan_fisioterapi) }}" required="required">
		                    </div>
              				<div class="form-group{{ $errors->has('evaluasi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Evaluasi</label>
		                        <textarea class="form-control" rows="5" cols="4" name="evaluasi">{{ $assesment->diagnosa_fisioterapi }}</textarea>
		                    </div>
		                    <div class="form-group{{ $errors->has('pelayanan_fisioterapi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Pelayanan Fisiotarapi</label>
		                        <select class="form-control" name="pelayanan_fisioterapi">
		                        	<option value=""> </option>
		                        	@foreach($pelayanan as $data_pelayanans)
		                        		<option value="{{ $data_pelayanans['id_pelayanan'] }}" {{ ($assesment->id_pelayanan == $data_pelayanans['id_pelayanan'])? 'selected="selected"' : '' }} >{{ $data_pelayanans['nama_pelayanan'] }} (Rp.{{ number_format($data_pelayanans['tarif_pelayanan']) }})</option>
		                        	@endforeach
		                        </select>
		                    </div>
		                    <div class="form-group{{ $errors->has('petugas_fisioterapi') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Petugas Fisiotarapi</label>
		                        <select class="form-control" name="petugas_fisioterapi" required="request">
		                        	<option value=""> </option>
		                        	@foreach($fisioterapis as $data_petugas)
		                        		<option value="{{ $data_petugas['id_fisioterapi'] }}" {{ ($assesment->id_fisioterapi == $data_petugas['id_fisioterapi'])? 'selected="selected"' : '' }} > {{ $data_petugas['nama'] }}</option>
		                        	@endforeach
		                        </select>
		                    </div>
		                    <div class="form-group{{ $errors->has('catatan_khusus') ? ' has-error' : '' }}"> 
		                        <label for="name" class="control-label">Catatan Khusus</label>
		                        <textarea class="form-control" rows="5" cols="4" name="catatan_khusus">{{ $assesment->catatan_khusus }}</textarea>
		                    </div>
              			</div>
              		</div>
	              	<div class="card-footer"> 
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('assesment') }}">
			                    <button class="btn btn-primary" type="button">Batal</button>
			                </a>
		                </div>
	              	</div>
              	</form>
            </div>
        </div>
	</div>     
</div>
@stop

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('#diagnosa_fisioterapi').autocomplete({ 
	        source: function(request, response) {
	        	var pathIcd10 = "{{ url('assesment/searchIcd10') }}";
	            $.ajax({
		            url: pathIcd10,
		            data: {
		                    term : request.term
		             },
		            dataType: "json", 
		            success: function(data){
		               var resp = $.map(data,function(obj){ 
		                    return obj.kode_penyakit+' ('+obj.nama_penyakit+')';
		               }); 
		 
		               response(resp);
		            }
		        });
		    },
		    minLength: 3
	 	});

	 	$('#tindakan_fisioterapi').autocomplete({ 
	        source: function(request, response) {
	        	var pathIcd10 = "{{ url('assesment/searchIcd9') }}";
	            $.ajax({
		            url: pathIcd10,
		            data: {
		                    term : request.term
		             },
		            dataType: "json", 
		            success: function(data){
		               var resp = $.map(data,function(obj){ 
		                    return obj.kode_tindakan+' ('+obj.nama_tindakan+')';
		               }); 
		 
		               response(resp);
		            }
		        });
		    },
		    minLength: 3
	 	});


		$('#search_pasien').click(function(){ 
			var no_rm = $('#query').val();

			if(no_rm.length >= 8){
				$('#query').val('Loading...');

				var path = "{{ url('assesment/searchAjax') }}";
				 $.ajax({
					url		: path, 
					data	: 'no_rm='+no_rm+'&_token = <?php echo csrf_token() ?>',  
					type	: 'GET', 
					dataType: 'json', 
					success	: function(data){
						if(data.pasien_arr){
							$('#no_rm_pasien').val(data.pasien_arr.no_rm);
							$('#nama_pasien').val(data.pasien_arr.nama_pasien);
							$('#jenis_kelamin_pasien').val(data.pasien_arr.alamat_pasien);
							$('#alamat_pasien').val(data.pasien_arr.nama_pasien);
							$('#tgl_lahir_pasien').val(data.pasien_arr.tgl_lahir_pasien);
							$('#no_hp_pasien').val(data.pasien_arr.no_hp_pasien);
							$('#umur').val(data.pasien_arr.umur);
							 
						}else{
							$('#no_rm_pasien').val('');
							$('#nama_pasien').val('');
							$('#jenis_kelamin_pasien').val('');
							$('#alamat_pasien').val('');
							$('#tgl_lahir_pasien').val('');
							$('#no_hp_pasien').val('');
							$('#umur').val('');
							 
							alert('Pasien Tidak Ditemukan');

						}
						$('#query').val(no_rm);	
					},
				});
			}else{
				alert('minimal 8 digit');
			}
		});
	});
</script>
@endsection