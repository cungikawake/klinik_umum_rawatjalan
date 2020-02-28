<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input; 
use App\Models\assesment;
use App\Models\pelayanan;
use App\Models\transaksi;
use App\Models\petugas;
use App\Models\fisioterapis;
use App\Models\icd9;
use App\Models\icd10;
use App\User;
use Illuminate\Support\Facades\Validator;

class AssesmentController extends Controller
{
    public function index(){
       $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm')
                    ->select(
                    	'pasien.no_rm as no_rm', 
                    	'pasien.nama_pasien', 
                    	'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                    	'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                    	'pasien.umur as umur', 
                    	'pasien.no_hp_pasien as no_hp_pasien', 
                    	'pasien.alamat_pasien as alamat_pasien', 

                    	'assesment.tgl_terapi as tgl_terapi', 
                    	'assesment.created_at as created_at', 
                    	'assesment.id_pelayanan', 'assesment.id_assesment')
                    ->orderBy('assesment.created_at', 'Asc')
                    ->paginate(10);

      return view('klinik.assesment.index',compact('pasien_arr'))->with('i');
    }

    public function create($id = false){
    	$fisioterapis = fisioterapis::get();
    	$pelayanan = pelayanan::get();
    	$pasien_arr = array();

    	if($id){
    		$query = $id;

	        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm')
	                    ->select(
	                    	'pasien.no_rm as no_rm', 
	                    	'pasien.nama_pasien', 
	                    	'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
	                    	'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
	                    	'pasien.umur as umur', 
	                    	'pasien.no_hp_pasien as no_hp_pasien', 
	                    	'pasien.alamat_pasien as alamat_pasien', 

	                    	'assesment.created_at as created_at', 'assesment.id_pelayanan', 'assesment.id_assesment')
	                    ->where('assesment.id_assesment', $query)
	                    ->first(); 
    	}

    	return view('klinik.assesment.create', compact('fisioterapis', 'pelayanan', 'pasien_arr'));
    }

    public function searchAjax(Request $request){
    	$query = $request->no_rm;

        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm')
                    ->select(
                    	'pasien.no_rm as no_rm', 
                    	'pasien.nama_pasien', 
                    	'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                    	'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                    	'pasien.umur as umur', 
                    	'pasien.no_hp_pasien as no_hp_pasien', 
                    	'pasien.alamat_pasien as alamat_pasien', 

                    	'assesment.created_at as created_at', 'assesment.id_pelayanan', 'assesment.id_assesment')
                    ->where('pasien.no_rm', $query)
                    ->first(); 

        return response()->json(array('pasien_arr'=> $pasien_arr), 200);
    }

    public function searchIcd10(Request $request)
    {
        if ($request->has('term')) { 
            $cari = $request->term;
            $data = icd10::where('nama_penyakit', 'LIKE', "%".$cari."%")->get();
             
            return response()->json($data);
        }
    }

    public function searchIcd9(Request $request)
    {
        if ($request->has('term')) {
            $cari = $request->term;
            $data = icd9::where('nama_tindakan', 'LIKE', "%".$cari."%")->get();
             
            return response()->json($data);
        }
    }

    public function store(Request $request){
    	
    	/*
    	$this->validate($request, [ 
            'no_rm_pasien' => 'required',
            'nama_pasien' => 'required', 
            'keluhan' => 'required', 
            'inspeksi_statis' => 'required',
            'evaluasi' => 'required',
            'pemeriksaan_spesifik' => 'required',
            'problem_fisioterapi' => 'required',
            'activity_limitations' => 'required',
            'participation_restriction' => 'required',
            'diagnosa_fisioterapi' => 'required',
            'pelayanan_fisioterapi' => 'required',
            'petugas_fisioterapi' => 'required',
            'keterbatasan_gerakan' => 'required',
            'tissue_impairment' => 'required'
     	]);
		*/
     	//get assesment 

     	if(isset($request->tindakan_fisioterapi)){
     		$jenis ="update";

     		$assesment = assesment::findOrFail($request->id_assesment);
     		$assesment->id_assesment  = $request->id_assesment;

     		if(isset($request->tindakan_fisioterapi) && !empty($request->tindakan_fisioterapi)){
     			$assesment->tindakan_fisioterapi = $request->tindakan_fisioterapi;
     		}
            
     	}else{
     		$jenis ="new";
     		$assesment = assesment::findOrFail($request->id_assesment); 
     		$assesment->tgl_terapi = date('Y-m-d H:i:s');
     	}

     	$assesment->no_rm = $request->no_rm;
     	$assesment->keluhan = $request->keluhan;
     	$assesment->riwayat_keluhan = $request->riwayat_keluhan;
     	$assesment->inspeksi_statis = $request->inspeksi_statis;
     	$assesment->inspeksi_dinamis = $request->inspeksi_dinamis;
     	$assesment->keterbatasan_gerakan = $request->keterbatasan_gerakan;
     	$assesment->tissue_impairment = $request->tissue_impairment;
     	$assesment->pemeriksaan_spesifik = $request->pemeriksaan_spesifik;
     	$assesment->problem_fisioterapi = $request->problem_fisioterapi;
     	$assesment->activity_limitations = $request->activity_limitations;
     	$assesment->participation_restriction = $request->participation_restriction;
     	$assesment->diagnosa_fisioterapi = $request->diagnosa_fisioterapi;
     	$assesment->evaluasi = $request->evaluasi;
     	$assesment->id_pelayanan = $request->pelayanan_fisioterapi;
     	$assesment->id_fisioterapi = $request->petugas_fisioterapi;
     	$assesment->catatan_khusus = $request->catatan_khusus;

     	if($assesment->save()){
     		if($jenis == 'new'){
     			$pelayanan = pelayanan::where('id_pelayanan', $request->pelayanan_fisioterapi)->first();

     			$transaksi = new transaksi;
     			$transaksi->no_rm = $request->no_rm;
     			$transaksi->id_assesment = $assesment->id_assesment;
     			$transaksi->total_harga = $pelayanan->tarif_pelayanan;
     			$transaksi->status_transaksi = 0;
     			if($transaksi->save()){
                    return redirect()->back()->with('success', 'Berhasil Menyimpan Data Assesment dan Transaksi Baru');
                }else{
                    return redirect()->back()->with('error', 'Gagal Menyimpan Data Assesment dan Transaksi Baru');
                }
     		}

     		return redirect()->back()->with('success', 'Berhasil Menyimpan Data Assesment');
     	}else{
     		return redirect()->back()->with('error', 'Gagal Menyimpan Data Assesment');
     	}
    }

    public function edit($id = false){
    	$fisioterapis = fisioterapis::get();
    	$pelayanan = pelayanan::get();
    	$pasien_arr = array();

    	if($id){
    		$query = $id;

	        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm')
	                    ->select(
	                    	'pasien.no_rm as no_rm', 
	                    	'pasien.nama_pasien', 
	                    	'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
	                    	'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
	                    	'pasien.umur as umur', 
	                    	'pasien.no_hp_pasien as no_hp_pasien', 
	                    	'pasien.alamat_pasien as alamat_pasien', 

	                    	'assesment.created_at as created_at', 'assesment.id_pelayanan', 'assesment.id_assesment')
	                    ->where('assesment.id_assesment', $query)
	                    ->first();

	        $assesment = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
	                    ->where('assesment.id_assesment', $query)
	                    ->first();  
    	}

    	return view('klinik.assesment.edit', compact('fisioterapis', 'pelayanan', 'pasien_arr','assesment'));
    }

    public function detail($id = false){
        $fisioterapis = fisioterapis::get();
        $pelayanan = pelayanan::get();
        $pasien_arr = array();

        if($id){
            $query = $id;

            $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm')
                        ->select(
                            'pasien.no_rm as no_rm', 
                            'pasien.nama_pasien', 
                            'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                            'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                            'pasien.umur as umur', 
                            'pasien.no_hp_pasien as no_hp_pasien', 
                            'pasien.alamat_pasien as alamat_pasien', 

                            'assesment.created_at as created_at', 'assesment.id_pelayanan', 'assesment.id_assesment')
                        ->where('assesment.id_assesment', $query)
                        ->first();

            $assesment = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                        ->where('assesment.id_assesment', $query)
                        ->first();  
        }

        return view('klinik.assesment.detail', compact('fisioterapis', 'pelayanan', 'pasien_arr','assesment'));
    }
}
