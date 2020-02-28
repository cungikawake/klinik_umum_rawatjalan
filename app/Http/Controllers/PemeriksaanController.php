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

class PemeriksaanController extends Controller
{
    public function index(){
      $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->select(
                    'pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter'
                     )
                     ->orderBy('pemeriksaan.created_at', 'Desc')
                    ->paginate(10);
        
      return view('klinik.pemeriksaan.index',compact('pasien_arr'))->with('i');
    }
    
    public function searchAjax(Request $request){
        $query = $request->no_rm;

        $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                     ->select('pasien.no_rm as no_rm',
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
                    ->where('pasien.no_rm', $query)
                    ->first(); 

        return response()->json(array('pasien_arr'=> $pasien_arr), 200);
    }

    public function edit($id = false){
        $dokter = dokter::get();
        $tindakan = tindakan::get();
        $pasien_arr = array();
        $show_detail = false;
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
        
        return view('klinik.pemeriksaan.edit', compact('dokter', 'tindakan', 'pasien_arr','pemeriksaan', 'resep_internal', 'resep_external', 'show_detail'));
    }

    public function detail($id = false){
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
        
        return view('klinik.pemeriksaan.edit', compact('dokter', 'tindakan', 'pasien_arr','pemeriksaan', 'resep_internal', 'resep_external', 'show_detail'));
    }

    public function update(Request $request)
    {
        //pemeriksaan
        $pemeriksaan = pemeriksaan::findOrFail($request->id_pemeriksaan);
        $pemeriksaan->id_dokter = $request->id_dokter;
        $pemeriksaan->tindakan = $request->tindakan;
        $pemeriksaan->diagnosa = $request->diagnosa;
        $pemeriksaan->anamnesa = $request->anamnesa;
        $pemeriksaan->pmr_penunjang = $request->pmr_penunjang;
        $pemeriksaan->tgl_pemeriksaan = date('Y-m-d H:i:s');
        $pemeriksaan->status_pemeriksaan = 1;

        if($pemeriksaan->save()){
            $pasien = pasien::where('no_rm',$request->no_rm)->first();

            if(!empty($request->obat_external)){
                foreach ($request->obat as $key => $value) {
                    $obat = explode(' | ', $value);
                    $data_obat = obat::where('nama_obat', $obat[0])->first();
                    if(isset($data_obat->id_obat)){
                        $resep_internal = new resep_obat;
                        $resep_internal->id_obat = $data_obat->id_obat;
                        $resep_internal->id_pemeriksaan = $request->id_pemeriksaan;
                        $resep_internal->id_pasien = $pasien->id_pasien;
                        $resep_internal->qty_obat = $request->qty_obat[$key];
                        $resep_internal->harga_obat = $data_obat->harga_detail;
                        $resep_internal->aturan_pakai = $request->aturan_obat[$key];
                        $resep_internal->satuan = $data_obat->satuan;
                        $resep_internal->status_obat = 0; //internal
                        $resep_internal->status_resep = 0;
                        $resep_internal->save();

                        if($resep_internal->save()){
                            //update stok obat
                            $stok_awal = $data_obat->persediaan;
                            $qty_obat = $request->qty_obat[$key];
                            $sisa_obat = $stok_awal - $qty_obat; 
                            
                            $farmasi = obat::findOrFail($data_obat->id_obat)->first();
                            $farmasi->persediaan = $sisa_obat;
                            $farmasi->save();

                        }
                    }
                    
                }
            }

            if(!empty($request->obat_external)){
                foreach ($request->obat_external as $key => $value) {
                    $obat = explode(' | ', $value);
                    
                    $data_obat = obat::where('nama_obat', $obat[0])->first();
                    
                    if(isset($data_obat->id_obat)){
                        $resep_external = new resep_obat;
                        $resep_external->id_obat = $data_obat->id_obat;
                        $resep_external->id_pemeriksaan = $request->id_pemeriksaan;
                        $resep_external->id_pasien = $pasien->id_pasien;
                        $resep_external->qty_obat = $request->qty_obat_external[$key];
                        $resep_external->harga_obat = $data_obat->harga_detail;
                        $resep_external->aturan_pakai = $request->aturan_obat_external[$key];
                        $resep_external->satuan = $data_obat->satuan;
                        $resep_external->status_obat = 1; //external
                        $resep_external->status_resep = 0; 
                        $resep_external->save();
                    }
                    
                }
            }
            
            return redirect('pemeriksaan')->with('success', 'Berhasil Menyimpan Data Pemeriksaan');
        }else{

            return redirect('pemeriksaan')->with('error', 'Gagal Menyimpan Data Pemeriksaan');
        }


    }

    public function searchTindakan(Request $request)
    {
        if ($request->has('keyword')) {
            $cari = $request->keyword;
            $data = tindakan::where('nama_tindakan', 'LIKE', "%".$cari."%")->get();
             
            return response()->json($data);
        }
    }

    public function searchObat(Request $request)
    {
        if ($request->has('keyword')) {
            $cari = $request->keyword;
            $data = obat::where('persediaan','>',50)
                    ->where('nama_obat', 'LIKE', "%".$cari."%")
                    ->get();
             
            return response()->json($data);
        }
    }

     public function searchObatExternal(Request $request)
    {
        if ($request->has('keyword')) {
            $cari = $request->keyword;
            $data = obat::where('nama_obat', 'LIKE', "%".$cari."%")
                    ->get();
             
            return response()->json($data);
        }
    }

     public function searchPemeriksaan(Request $request)
    {   

        $query = $request->search;

        $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan')
                    ->where('pasien.nama_pasien','like',"%".$query."%")
                    ->orWhere('pasien.no_rm','like',"%".$query."%")
                    ->paginate(10);

        return view('klinik.pemeriksaan.index',compact('pasien_arr','query'))->with('i');           
    }
     
}
