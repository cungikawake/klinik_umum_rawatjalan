<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\pasien;
use App\Models\farmasi;
use App\Models\obat;
use App\Models\resep_obat;
use App\Models\pemeriksaan;
use App\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class FarmasiController extends Controller
{
    public function index(){
      $petugas_arr = farmasi::paginate(10);
      return view('klinik.farmasi.index',compact('petugas_arr'))->with('i');
    }

    public function create(){ 
    	return view('klinik.farmasi.create');
    }

    public function store(Request $request){
    	
      $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      $User = new User;
      $petugas = new farmasi;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 3; //farmasi

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir; 

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data farmasi');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data farmasi');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = farmasi::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.farmasi.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = farmasi::findOrFail($request->id_farmasi);
 
       
      $User->name = $request->name;
      $User->email = $request->email; 

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir;
        
        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Update Data farmasi');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data farmasi');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }

    public function getResep(){
      $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                     
                    ->paginate(10); 

      return view('klinik.farmasi.resep_obat',compact('pemeriksaan_arr'))->with('i');

    }

     public function searchResep(Request $request)
    { 

      $query = $request->search;

      $pemeriksaan_arr = $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                     
                    ->where('pasien.no_rm', 'like',"%".$query."%")
                    ->orWhere('nama_pasien','like',"%".$query."%") 
                    ->paginate(10);; 
       
      return view('klinik.farmasi.resep_obat',compact('pemeriksaan_arr'))->with('i');
    }

     public function EditResep($id = false)
    { 

      $id_pemeriksaan = $id;

      $pemeriksaan_arr = $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->join('resep_obat', 'resep_obat.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
                    ->join('obat', 'obat.id_obat', 'resep_obat.id_obat')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter', 
                     'resep_obat.status_obat as status_obat', 
                     'resep_obat.qty_obat', 
                     'resep_obat.satuan', 
                     'resep_obat.aturan_pakai', 
                     'obat.nama_obat as nama_obat' 
                    )
                    ->where('resep_obat.id_pemeriksaan', $id_pemeriksaan)
                    ->get();
      
      $pasien = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')        ->where('pemeriksaan.id_pemeriksaan', $pemeriksaan_arr[0]->id_pemeriksaan)->first();

      return view('klinik.farmasi.resep_edit_obat',compact('pemeriksaan_arr', 'pasien'));
    }

    public function UpdateResep(Request $request){
      $id_pemeriksaan = $request->id_pemeriksaan;

      $resep_arr = resep_obat::where('id_pemeriksaan', $id_pemeriksaan)->get();
      
      foreach ($resep_arr as $key => $value) {
        $resep = resep_obat::findOrFail($value->id_resep);  
        $resep->status_resep = 1;
        $resep->save();
      }

      $pemeriksaan_arr = $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->join('resep_obat', 'resep_obat.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
                    ->join('obat', 'obat.id_obat', 'resep_obat.id_obat')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter', 
                     'resep_obat.status_obat as status_obat', 
                     'resep_obat.qty_obat', 
                     'resep_obat.satuan', 
                     'resep_obat.aturan_pakai', 
                     'obat.nama_obat as nama_obat' 
                    )
                    ->where('resep_obat.id_pemeriksaan', $id_pemeriksaan)
                    ->get();
      
      $pasien = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')        ->where('pemeriksaan.id_pemeriksaan', $pemeriksaan_arr[0]->id_pemeriksaan)->first();

      return redirect('farmasi/obat');
      
    }

    public function CetakResep($id_pemeriksaan = false){
       $pasien = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')       ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter') 
                ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)->first();

       $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->join('resep_obat', 'resep_obat.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
                    ->join('obat', 'obat.id_obat', 'resep_obat.id_obat')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.tgl_pemeriksaan',
                     'pemeriksaan.id_dokter',
                     'dokter.nama as nama_dokter', 
                     'resep_obat.status_obat as status_obat', 
                     'resep_obat.qty_obat', 
                     'resep_obat.satuan', 
                     'resep_obat.aturan_pakai', 
                     'resep_obat.harga_obat', 
                     'obat.nama_obat as nama_obat' 
                    )
                    ->where('resep_obat.id_pemeriksaan', $id_pemeriksaan) 
                    ->get();
        
        return view('klinik.farmasi.resep_cetak_obat',compact('pemeriksaan_arr', 'pasien'));
         
    }
    
}
