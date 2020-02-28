@extends('klinik.layouts.app')
@section('title', 'Create Kunjungan')

@section('content')
<div class="col-lg-12 col-md-12 lf_topics_wrapper"> 
  <h3>Pasien | Kunjungan Baru</h3>
  <p>Pastikan pasien sudah terdaftar</p>
  <hr>
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
              	<form class="form-horizontal" role="form" method="POST" action="{{ url('pasien/kunjungan/do_register') }}">
                        {{ csrf_field() }}

	              	<div class="card-body ">
              			
	              		<div class="form-group{{ $errors->has('no_pendaftaran') ? ' has-error' : '' }}">
	                        <label for="no_pendaftaran" class="col-md-4 control-label">No Pendaftaran</label>

	                        <div class="col-md-6">
	                            <input id="no_pendaftaran" type="text" class="form-control" name="no_pendaftaran" value="{{ old('no_pendaftaran') }}" readonly="readonly">

	                            @if ($errors->has('no_pendaftaran'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_pendaftaran') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 

	                    <div class="form-group{{ $errors->has('no_rm') ? ' has-error' : '' }}">
	                        <label for="no_rm" class="col-md-4 control-label">No RM</label>

	                        <div class="col-md-6">
	                            <input id="no_rm" type="text" class="form-control" name="no_rm" value="{{ old('no_rm') }}" autofocus >
	                            <p class="loading"></p>
	                            @if ($errors->has('no_rm'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_rm') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                        <div class="col-md-2">
	                        	<button id="search_pasien" class="btn btn-danger" type="button" style="margin-top: -5px;">Cari</button>
	                        </div>
	                    </div>

	                    <div class="form-group{{ $errors->has('nama_pasien') ? ' has-error' : '' }}">
	                        <label for="name" class="col-md-4 control-label">Nama</label>

	                        <div class="col-md-6">
	                        	<input id="id_pasien" type="hidden" class="form-control" name="id_pasien" value="{{ old('id_pasien') }}" required autofocus readonly="readonly">

	                        	<input id="no_rm_pasien" type="hidden" class="form-control" name="no_rm_pasien" value="{{ old('no_rm_pasien') }}" required autofocus readonly="readonly">

	                            <input id="name" type="text" class="form-control" name="nama_pasien" value="{{ old('nama_pasien') }}"  autofocus readonly="readonly">

	                            @if ($errors->has('nama_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('nama_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div> 

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jenis Kelamin</label>

	                        <div class="col-md-6">
	                        	<input type="text" id="jenis_kelamin_pasien" class="form-control {{ $errors->has('jenis_kelamin_pasien') ? ' has-error' : '' }}" name="jenis_kelamin_pasien" style="height: auto;"  autofocus readonly="readonly"> 

	                            @if ($errors->has('jenis_kelamin_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('jenis_kelamin_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Alamat</label>

	                        <div class="col-md-6">
	                        	<input id="alamat_pasien" type="text" name="alamat_pasien" class="form-control{{ $errors->has('alamat_pasien') ? ' has-error' : '' }}"  autofocus readonly="readonly">

	                            @if ($errors->has('alamat_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alamat_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="no_hp_pasien" class="col-md-4 control-label">No Hp</label>

	                        <div class="col-md-6">
	                        	<input id="no_hp_pasien" type="text" name="no_hp_pasien" class="form-control{{ $errors->has('no_hp_pasien') ? ' has-error' : '' }}"  autofocus readonly="readonly">

	                            @if ($errors->has('no_hp_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('no_hp_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Tahun Lahir</label>

	                        <div class="col-md-6">
	                        	<input id="tgl_lahir_pasien" type="text" name="tgl_lahir_pasien" class="form-control{{ $errors->has('tgl_lahir_pasien') ? ' has-error' : '' }}"  autofocus readonly="readonly">

	                            @if ($errors->has('tgl_lahir_pasien'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('tgl_lahir_pasien') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Umur</label>

	                        <div class="col-md-6">
	                        	<input id="umur" type="text" name="umur" class="form-control{{ $errors->has('umur') ? ' has-error' : '' }}"  autofocus readonly="readonly">

	                            @if ($errors->has('umur'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('umur') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Jenis Jaminan</label>

	                        <div class="col-md-6">
	                        	<select  name="jaminan" required="required">
	                        		<option value="">Jaminan</option>
	                        		<option value="UMUM">UMUM</option>
	                        		<option value="BPJS">BPJS</option>
	                        	</select>
	                        	<input type="text" name="no_bpjs" class="form-control" placeholder="no bpjs">
	                            @if ($errors->has('umur'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('umur') }}</strong>
	                                </span> 
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Layanan</label>

	                        <div class="col-md-6"> 
	                        	<select  name="pelayanan" required="required" class="form-control" style="height: auto;">
	                        		<option value="">Layanan</option>
	                        		<option value="BP">BP = balai pengobatan</option>
	                        		<option value="Kb">Kb = keluarga berencana</option>
	                        		<option value="Vac">Vac = vaksinasi</option> 
	                        		<option value="Ph">Ph = periksa hamil</option>
	                        		<option value="Partus">Partus = melahirkan</option> 
	                        		<option value="Bpg">Bpg = balai pengobatan gigi</option>
	                        	</select>
	                        	  
	                            @if ($errors->has('umur'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('umur') }}</strong>
	                                </span> 
	                            @endif
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="password" class="col-md-4 control-label">Alergi</label>

	                        <div class="col-md-6">
	                        	<input id="alergi" type="text" name="alergi" class="form-control{{ $errors->has('alergi') ? ' has-error' : '' }}"  autofocus >

	                            @if ($errors->has('alergi'))
	                                <span class="help-block">
	                                    <strong>{{ $errors->first('alergi') }}</strong>
	                                </span>
	                            @endif
	                        </div>
	                    </div>
              		</div>
	              	<div class="card-footer">
		                <hr>
		                <div class="stats text-right">
		                	<button class="btn btn-danger" type="submit">Simpan</button>
			                <a href="{{ url('kunjungan') }}">
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#search_pasien').click(function(){ 
			var no_rm = $('#no_rm').val();

			if(no_rm.length >= 8){
				$('.loading').html('Loading.........');

				var path = "{{ url('pasien/searchAjax') }}";
				 $.ajax({
					url		: path, 
					data	: 'no_rm='+no_rm+'&_token = <?php echo csrf_token() ?>',  
					type	: 'GET', 
					dataType: 'json', 
					success	: function(data){
						if(data.pasien_arr){
							$('#no_rm_pasien').val(data.pasien_arr.no_rm);
							$('#id_pasien').val(data.pasien_arr.id_pasien);
							$('#name').val(data.pasien_arr.nama_pasien);
							$('#jenis_kelamin_pasien').val(data.pasien_arr.jenis_kelamin_pasien);
							$('#alamat_pasien').val(data.pasien_arr.alamat_jalan+','+data.pasien_arr.alamat_kecamatan+', '+data.pasien_arr.alamat_kabupaten);
							$('#tgl_lahir_pasien').val(data.pasien_arr.tgl_lahir_pasien);
							$('#no_hp_pasien').val(data.pasien_arr.no_hp_pasien);
							$('#umur').val(data.pasien_arr.umur);

						}else{
							$('#id_pasien').val('');
							$('#no_rm_pasien').val('');
							$('#name').val('');
							$('#jenis_kelamin_pasien').val('');
							$('#alamat_pasien').val('');
							$('#tgl_lahir_pasien').val('');
							$('#no_hp_pasien').val('');
							$('#umur').val('');
							alert('Pasien Tidak Ditemukan');

						}
						$('.loading').html('');
						
					},
				});
			}else{
				alert('minimal 8 digit');
			}
		});
	});
</script>
@endsection