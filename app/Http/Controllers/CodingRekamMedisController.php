<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\tindakan; 
use App\Models\pasien; 
use App\Models\pemeriksaan; 
use App\Models\dokter; 
use App\Models\obat; 
use App\Models\resep_obat; 
use App\Models\icd10; 
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class CodingRekamMedisController extends Controller
{
    public function index(){
      $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->leftJoin('icd10', 'icd10.id_icd10', 'pemeriksaan.id_icd_10')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.status_koding',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter',
                     'icd10.kode_penyakit',
                    'icd10.nama_penyakit'
                 	)
                    ->paginate(10);
      return view('klinik.coding_rm.index',compact('pasien_arr'))->with('i');
    }
     

    public function detail($id = false){
        $dokter = dokter::get();
        $tindakan = tindakan::get();
        $pasien_arr = array();
        $show_detail = true;
        if($id){
            $id_pemeriksaan = $id;

            $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                        ->leftJoin('icd10', 'icd10.id_icd10', 'pemeriksaan.id_icd_10')
                        ->select('pasien.no_rm as no_rm',
                             'pasien.nama_pasien', 
                             'pasien.jenis_kelamin_pasien', 
                             'pasien.alamat_jalan', 
                             'pasien.alamat_kecamatan', 
                             'pasien.alamat_kabupaten', 
                             'pasien.tgl_lahir_pasien', 
                             'pasien.no_hp_pasien', 
                             'pasien.nama_pasien', 
                             'pemeriksaan.tgl_kunjungan', 
                             'pemeriksaan.jaminan', 
                             'pemeriksaan.no_bpjs', 
                             'pemeriksaan.pelayanan', 
                             'pemeriksaan.id_pemeriksaan',
                             'pemeriksaan.status_pemeriksaan',
                             'pemeriksaan.tgl_pemeriksaan',
                             'pemeriksaan.id_dokter',
                             'pemeriksaan.id_icd_10',
                             'icd10.kode_penyakit',
                             'icd10.nama_penyakit'
                            )
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->first();

            $pemeriksaan = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                        ->leftJoin('icd10', 'icd10.id_icd10', 'pemeriksaan.id_icd_10') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->first(); 

            $resep_internal = resep_obat::join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', 'resep_obat.id_pemeriksaan')
                        ->join('obat', 'obat.id_obat', 'resep_obat.id_obat') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->where('resep_obat.status_obat', 0)
                        ->get(); 

            $resep_external = resep_obat::join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', 'resep_obat.id_pemeriksaan') 
                        ->join('obat', 'obat.id_obat', 'resep_obat.id_obat') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->where('resep_obat.status_obat', 1)
                        ->get();            
        }
        
        return view('klinik.coding_rm.edit', compact('dokter', 'tindakan', 'pasien_arr','pemeriksaan', 'resep_internal', 'resep_external', 'show_detail'));
    }


 

     public function searchPemeriksaan(Request $request)
    {   

        $query = $request->search;

        $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->leftJoin('icd10', 'icd10.id_icd10', 'pemeriksaan.id_icd_10')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.status_koding',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter',
                     'icd10.kode_penyakit',
                    'icd10.nama_penyakit'
                    )
                    ->where('pasien.nama_pasien','like',"%".$query."%")
                    ->orWhere('pasien.no_rm','like',"%".$query."%")
                    ->paginate(10);

        return view('klinik.coding_rm.index',compact('pasien_arr','query'))->with('i');           
    }

    public function update($id = false){
        $dokter = dokter::get();
        $tindakan = tindakan::get();
        $pasien_arr = array();
        $show_detail = true;
        
        if($id){
            $id_pemeriksaan = $id;

            $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                        ->select('pasien.no_rm as no_rm',
                             'pasien.nama_pasien', 
                             'pasien.jenis_kelamin_pasien', 
                             'pasien.alamat_jalan', 
                             'pasien.alamat_kecamatan', 
                             'pasien.alamat_kabupaten', 
                             'pasien.tgl_lahir_pasien', 
                             'pasien.no_hp_pasien', 
                             'pasien.nama_pasien', 
                             'pemeriksaan.tgl_kunjungan', 
                             'pemeriksaan.jaminan', 
                             'pemeriksaan.no_bpjs', 
                             'pemeriksaan.pelayanan', 
                             'pemeriksaan.id_pemeriksaan',
                             'pemeriksaan.status_pemeriksaan',
                             'pemeriksaan.tgl_pemeriksaan',
                             'pemeriksaan.id_dokter'
                            )
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->first();

            $pemeriksaan = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->first(); 

            $resep_internal = resep_obat::join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', 'resep_obat.id_pemeriksaan')
                        ->join('obat', 'obat.id_obat', 'resep_obat.id_obat') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->where('resep_obat.status_obat', 0)
                        ->get(); 

            $resep_external = resep_obat::join('pemeriksaan', 'pemeriksaan.id_pemeriksaan', 'resep_obat.id_pemeriksaan') 
                        ->join('obat', 'obat.id_obat', 'resep_obat.id_obat') 
                        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                        ->where('resep_obat.status_obat', 1)
                        ->get();            
        }
        
        return view('klinik.coding_rm.edit', compact('dokter', 'tindakan', 'pasien_arr','pemeriksaan', 'resep_internal', 'resep_external', 'show_detail'));
    }

    public function searchICD10(Request $request)
    {
        if ($request->has('keyword')) {
            $cari = $request->keyword;
            $data = icd10::where('nama_penyakit', 'LIKE', "%".$cari."%")->get();
             
            return response()->json($data);
        }
    }

    public function updatePemeriksaan(Request $request){

        $icd10 = explode(' | ', $request->icd10);
        $icd10 = icd10::where('kode_penyakit', $icd10[0])->first();

        $rm = pemeriksaan::findOrFail($request->id_pemeriksaan);
        $rm->id_icd_10 = $icd10->id_icd10;
        $rm->status_koding = 1;

        if($rm->save()){
            return redirect('coding_rm')->with('success', 'Berhasil Menyimpan Data ICD 10');
        }else{
            return redirect('coding_rm')->with('error', 'Gagal Menyimpan Data ICD 10');
        }
    }
     
}
