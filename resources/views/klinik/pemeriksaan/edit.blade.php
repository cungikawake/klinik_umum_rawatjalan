@extends('klinik.layouts.app')
@section('title', 'Edit Pemeriksaan')

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
  <h3>Pemeriksaan | Proses Pemeriksaan</h3>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('pemeriksaan/edit_register') }}">
                        {{ csrf_field() }} 
	              	<div class="card-body "> 
	                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	                         
	                        <div class="col-md-6">
	                        	<input id="id_pemeriksaan" type="hidden" class="form-control" name="id_pemeriksaan" value="{{ old('id_pemeriksaan', $pasien_arr->id_pemeriksaan) }}" readonly="readonly"> 

	                        	<label for="name" class="control-label">No. RM</label>
	                            <input id="no_rm" type="text" class="form-control" name="no_rm" value="{{ old('no_rm', $pasien_arr->no_rm) }}" autofocus readonly="readonly"> 
	                        </div>
	                        <div class="col-md-6">
	                            <label for="name" class="control-label">Tgl Kunjungan</label>
	                            <input id="tgl_kunjungan" type="text" class="form-control" name="tgl_kunjungan" value="{{ old('tgl_kunjungan', $pasien_arr->tgl_kunjungan) }}" autofocus readonly="readonly"> 
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
	                            <input id="alamat_pasien" type="text" class="form-control" name="alamat_pasien" value="{{ old('alamat_pasien', $pasien_arr->alamat_jalan.','.$pasien_arr->alamat_kecamatan.','.$pasien_arr->alamat_kabupaten) }}" autofocus readonly="readonly"> 
	                        </div> 
	                        <div class="col-md-6">
	                        	<label for="name" class="control-label">Jaminan</label>
	                            <input id="jaminan" type="text" class="form-control" name="jaminan" value="{{ old('jaminan', $pasien_arr->jaminan) }}" autofocus readonly="readonly"> 
	                        </div> 
	                    </div>
	                    <hr>
	                    <div class="form-group">
	                    	<div class="col-md-12">
	                    		<h4>Tindakan Dokter</h4>
	              				<div class="form-group{{ $errors->has('diagnosa') ? ' has-error' : '' }}"> 
			                        <label for="name" class="control-label">Anamnesia</label>
			                       <input type="text" class="form-control" name="anamnesa" id="anamnesa" placeholder="Anamnesa" value="{{ old('anamnesa', $pemeriksaan->anamnesa) }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>
			                    </div> 
	              				<div class="form-group{{ $errors->has('diagnosa') ? ' has-error' : '' }}"> 
			                        <label for="name" class="control-label">Diagnosa</label>
			                       <input type="text" class="form-control" name="diagnosa" id="diagnosa" placeholder="Diagnosa" value="{{ old('diagnosa', $pemeriksaan->diagnosa) }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>
			                    </div>
			                    <div class="form-group{{ $errors->has('diagnosa') ? ' has-error' : '' }}"> 
			                        <label for="name" class="control-label">Cek Lab</label>
			                        <select class="form-control" name="pmr_penunjang" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>
			                        	<option value="Tidak Perlu" {{($pemeriksaan->pmr_penunjang == 'Tidak Perlu')? 'selected="selected"': ''}}>Tidak Perlu</option>
			                        	<option value="Perlu Cek Lab" {{($pemeriksaan->pmr_penunjang == 'Perlu Cek Lab')? 'selected="selected"': ''}}>Perlu Cek Lab</option>
			                        </select>
			                        
			                    </div>
			                    <div class="form-group{{ $errors->has('id_dokter') ? ' has-error' : '' }}"> 
			                        <label for="name" class="control-label">Dokter</label>
			                        <select class="form-control" name="id_dokter" required="request" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>
			                        	<option value="">Pilih Dokter</option>
			                        	@foreach($dokter as $data_petugas)
			                        		<option value="{{ $data_petugas['id_dokter'] }}" {{ ($pemeriksaan->id_dokter == $data_petugas['id_dokter'])? 'selected="selected"' : '' }} > 
			                        			{{ $data_petugas['nama'] }}
			                        		</option>
			                        	@endforeach
			                        </select>
			                    </div>

			                    <div class="form-group{{ $errors->has('tindakan') ? ' has-error' : '' }}"> 
			                       <div id="dynamic_field_tindakan">
								    	@if(empty($pemeriksaan->tindakan)) 
									    	<div class="row">
										  	  	<div class="col-md-10">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Tindakan 1</label> 
			                        					<input type="text" class="form-control tindakan" name="tindakan[]" id="tindakan_0"  placeholder="Ketik Tindakan" value="{{ old('tindakan') }}" required="required" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-2">
										  	  		<div class="form-group"> 
			                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addTindakan">+</button {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>
			                        				</div>
										  	  	</div>
									  	  	</div>
								  	  	@else
								  	  		<?php $i = 0; ?>
								  	  		@foreach($pemeriksaan->tindakan as $key => $value)
								  	  			<div class=" {{ ($key > 0)? 'row dynamic-added': 'row'}}" id="row{{$key}}">
											  	  	<div class="col-md-10">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Tindakan {{++$i}}</label> 
				                        					<input type="text" class="form-control tindakan" name="tindakan[]" id="tindakan_{{ $key }}"  placeholder="Ketik Tindakan" value="{{ old('tindakan', $value) }}" required="required" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
				                        				</div>
											  	  	</div>
											  	  	@if($key == 0)
												  	  	<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addTindakan" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>+</button>
					                        				</div>
												  	  	</div>
											  	  	@else
											  	  		<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-danger btn_remove" style="margin-top: 20px;"  id="{{$key}}" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>X</button>
					                        				</div>
												  	  	</div>
											  	  	@endif
										  	  	</div>
								  	  		@endforeach
								  	  	@endif 
								  	</div> 
			                    </div> 
	              			</div>
	              			<div class="col-md-6">
	                    		<h4>Resep Obat Internal</h4> 
			                    <div class="form-group{{ $errors->has('obat') ? ' has-error' : '' }}"> 
			                       <div id="dynamic_field_obat">
								    	@if(sizeof($resep_internal) == 0) 
									    	<div class="row">
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Obat </label> 
			                        					<input type="text" class="form-control obat" name="obat[]" id="obat_0"  placeholder="Ketik Obat" value="{{ old('obat') }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Qty </label> 
			                        					<input type="number" class="form-control qty" name="qty_obat[]" id="qty_obat_0"  placeholder="Ketik Qty" {{ ($show_detail == true)? 'readonly="readonly"' : ''}} > 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Aturan Pakai </label> 
			                        					<input type="text" class="form-control aturan" name="aturan_obat[]" id="aturan_obat_obat_0"  placeholder="Ketik Aturan Pakai" {{ ($show_detail == true)? 'readonly="readonly"' : ''}} > 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-2">
										  	  		<div class="form-group"> 
			                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addObat" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>+</button>
			                        				</div>
										  	  	</div>
									  	  	</div>
								  	  	@else
								  	  		<?php $i = 0; ?>
								  	  		@foreach($resep_internal as $key => $value)
									  	  		<div class=" {{ ($key > 0)? 'row dynamic-added': 'row'}}" id="rowObat{{$key}}">
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Obat </label> 
				                        					<input type="text" class="form-control obat" name="obat[]" id="obat_{{$key}}"  placeholder="Ketik Obat" value="{{ $value->nama_obat.' | '.$value->persediaan.' | Rp.'.$value->harga_detail.'/'.$value->satuan }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
				                        				</div>
											  	  	</div>
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Qty </label> 
				                        					<input type="number" class="form-control qty" name="qty_obat[]" id="qty_obat_{{$key}}"  placeholder="Ketik Qty" value="{{ $value->qty_obat}}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
				                        				</div>
											  	  	</div>
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Aturan Pakai </label> 
				                        					<input type="text" class="form-control aturan" name="aturan_obat[]" id="aturan_obat_obat_{{$key}}"  placeholder="Ketik Aturan Pakai" value="{{ $value->aturan_pakai}}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
				                        				</div>
											  	  	</div>
											  	  	@if($key == 0)
												  	  	<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addObat" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>+</button>
					                        				</div>
												  	  	</div>
											  	  	@else
											  	  		<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-danger btn_remove_obat" style="margin-top: 20px;"  id="{{$key}}" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>X</button>
					                        				</div>
												  	  	</div>
											  	  	@endif
										  	  	</div>
										  	@endforeach
								  	  	@endif
								  	</div> 
			                    </div> 
	              			</div>

	              			<div class="col-md-6">
	                    		<h4>Resep Obat External</h4> 
			                    <div class="form-group{{ $errors->has('obat') ? ' has-error' : '' }}"> 
			                       <div id="dynamic_field_obat_external">
								    	@if(sizeof($resep_internal) == 0) 
									    	<div class="row">
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Obat </label> 
			                        					<input type="text" class="form-control obat_external" name="obat_external[]" id="obat_external_0"  placeholder="Ketik Obat" value="{{ old('obat', $pemeriksaan->obat) }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}} > 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Qty </label> 
			                        					<input type="number" class="form-control qty" name="qty_obat_external[]" id="qty_obat_external_0"  placeholder="Ketik Qty" {{ ($show_detail == true)? 'readonly="readonly"' : ''}} > 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-3">
										  	  		<div class="form-group">
			                        					<label for="name" class="control-label">Aturan Pakai </label> 
			                        					<input type="text" class="form-control aturan" name="aturan_obat_external[]" id="aturan_obat_obat_external_0"  placeholder="Ketik Aturan Pakai"  {{ ($show_detail == true)? 'readonly="readonly"' : ''}}> 
			                        				</div>
										  	  	</div>
										  	  	<div class="col-md-2">
										  	  		<div class="form-group"> 
			                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addObatExternal" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>+</button>
			                        				</div>
										  	  	</div>
									  	  	</div>
								  	  	@else
								  	  		<?php $i = 0; ?>
								  	  		@foreach($resep_external as $key => $value)
									  	  		<div class=" {{ ($key > 0)? 'row dynamic-added': 'row'}}" id="rowObat{{$key}}">
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Obat </label> 
				                        					<input type="text" class="form-control obat_external" name="obat_external[]" id="obat_external_{{$key}}"  placeholder="Ketik Obat" value="{{ $value->nama_obat.' | '.$value->persediaan.' | Rp.'.$value->harga_detail.'/'.$value->satuan }}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>  
				                        				</div>
											  	  	</div>
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Qty </label> 
				                        					<input type="number" class="form-control qty" name="qty_obat_external[]" id="qty_obat_external_{{$key}}"  placeholder="Ketik Qty" value="{{ $value->qty_obat}}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}}>

				                        				</div>
											  	  	</div>
											  	  	<div class="col-md-3">
											  	  		<div class="form-group">
				                        					<label for="name" class="control-label">Aturan Pakai </label> 
				                        					<input type="text" class="form-control aturan" name="aturan_obat_external[]" id="aturan_obat_obat_external_{{$key}}"  placeholder="Ketik Aturan Pakai" value="{{ $value->aturan_pakai}}" {{ ($show_detail == true)? 'readonly="readonly"' : ''}} > 
				                        				</div>
											  	  	</div>
											  	  	@if($key == 0)
												  	  	<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-primary" style="margin-top: 20px;" id="addObatExternal" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>+</button>
					                        				</div>
												  	  	</div>
											  	  	@else
											  	  		<div class="col-md-2">
												  	  		<div class="form-group"> 
					                        					<button type="button" class="btn btn-danger btn_remove_obat_external" style="margin-top: 20px;"  id="{{$key}}" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>X</button>
					                        				</div>
												  	  	</div>
											  	  	@endif
										  	  	</div>
										  	@endforeach
								  	  	@endif

								  	</div> 
			                    </div> 
	              			</div>
	                    </div> 
              		</div>
              		<hr>
	              	<div class="card-footer"> 
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit" {{ ($show_detail == true)? 'disabled="disabled"' : ''}}>Simpan</button>
			                <a href="{{ url('pemeriksaan') }}">
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
	$(document).on('keyup', '.tindakan', function(){
	 	$('.tindakan').autocomplete({ 
	        source: function(request, response) { 
	        	var pathIcd9 = "{{ url('pemeriksaan/searchTindakan') }}";
	            $.ajax({
		            url: pathIcd9,
		            data: {
		                    keyword : request.term
		             },
		            dataType: "json", 
		            success: function(data){
		               var resp = $.map(data,function(obj){ 
		                    return obj.nama_tindakan+' | Rp.'+obj.tarif_tindakan;
		               }); 
		 
		               response(resp);
		            }
		        });
		    },
		    minLength: 3
	 	});
 	});

	$(document).on('keyup', '.obat', function(){
 		$('.obat').autocomplete({ 
	        source: function(request, response) { 
	        	var pathObat = "{{ url('pemeriksaan/searchObat') }}";
	            $.ajax({
		            url: pathObat,
		            data: {
		                    keyword : request.term
		             },
		            dataType: "json", 
		            success: function(data){
		               var resp = $.map(data,function(obj){ 
		                    return obj.nama_obat+' | '+obj.persediaan+' | Rp.'+obj.harga_detail+' /'+obj.satuan;
		               }); 
		 
		               response(resp);
		            }
		        });
		    },
		    minLength: 3
	 	});
	});

	$(document).on('keyup', '.obat_external', function(){
 		$('.obat_external').autocomplete({ 
	        source: function(request, response) { 
	        	var pathObat = "{{ url('pemeriksaan/searchObatExternal') }}";
	            $.ajax({
		            url: pathObat,
		            data: {
		                    keyword : request.term
		             },
		            dataType: "json", 
		            success: function(data){
		               var resp = $.map(data,function(obj){ 
		                    return obj.nama_obat+' | '+obj.satuan;
		               }); 
		 
		               response(resp);
		            }
		        });
		    },
		    minLength: 3
	 	});
	});

	$(document).ready(function(){  
		//add tindakan
		var i=1;  
	      $('#addTindakan').click(function(){  
	           i++;  
	           $('#dynamic_field_tindakan').append('<div class="row dynamic-added" id="row'+i+'"><div class="col-md-10"><div class="form-group"><label for="name" class="control-label">Tindakan '+i+' </label><input type="text" class="form-control tindakan" name="tindakan[]" id="tindakan_'+i+'"  placeholder="Ketik Tindakan"   required="required"></div></div><div class="col-md-2"><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-top: 31px;">X</button></div></div> </div>');  
	      });   

      	$(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 

           $('#row'+button_id+'').remove(); 
      	}); 

      	//add obat
		var i=1;  
	      $('#addObat').click(function(){  
	           i++;  
	           $('#dynamic_field_obat').append('<div class="row dynamic-added" id="rowObat'+i+'"><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Obat </label><input type="text" class="form-control obat" name="obat[]" id="obat_'+i+'"  placeholder="Ketik Obat" value="{{ old('obat', $pemeriksaan->obat) }}" required="required"></div></div><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Qty </label><input type="number" class="form-control qty" name="qty_obat[]" id="qty_obat_'+i+'"  placeholder="Ketik Qty" required="required"></div></div><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Aturan Pakai </label><input type="text" class="form-control aturan" name="aturan_obat[]" id="aturan_obat_obat_'+i+'"  placeholder="Ketik Aturan Pakai" required="required"></div></div><div class="col-md-2"><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_obat" style="margin-top: 31px;">X</button></div></div></div>');  
	      });   

      	$(document).on('click', '.btn_remove_obat', function(){  
           var button_id = $(this).attr("id");   
           $('#rowObat'+button_id+'').remove(); 
      	});

      	//add obat external
		var i=1;  
	      $('#addObatExternal').click(function(){  
	           i++;  
	           $('#dynamic_field_obat_external').append('<div class="row dynamic-added" id="rowObat'+i+'"><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Obat </label><input type="text" class="form-control obat" name="obat_external[]" id="obat_'+i+'"  placeholder="Ketik Obat" value="{{ old('obat', $pemeriksaan->obat) }}"></div></div><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Qty </label><input type="number" class="form-control qty" name="qty_obat_external[]" id="qty_obat_external'+i+'"  placeholder="Ketik Qty"></div></div><div class="col-md-3"><div class="form-group"><label for="name" class="control-label">Aturan Pakai </label><input type="text" class="form-control aturan" name="aturan_obat_external[]" id="aturan_obat_obat_external_'+i+'"  placeholder="Ketik Aturan Pakai"></div></div><div class="col-md-2"><div class="form-group"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_obat_external" style="margin-top: 31px;">X</button></div></div></div>');  
	      });   

      	$(document).on('click', '.btn_remove_obat_external', function(){  
           var button_id = $(this).attr("id");   
           $('#rowObat'+button_id+'').remove(); 
      	}); 
      	
	});
</script>
@endsection