<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\kasir;
use App\Models\pemeriksaan;
use App\Models\transaksi;
use App\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class KasirController extends Controller
{
    public function index(){
      $petugas_arr = kasir::paginate(10);
      return view('klinik.kasir.index',compact('petugas_arr'))->with('i');
    }

    public function create(){ 
    	return view('klinik.kasir.create');
    }

    public function store(Request $request){
    	
      $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      $User = new User;
      $petugas = new kasir;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 4; //kasir

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir; 

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data kasir');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data kasir');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = kasir::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.kasir.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = kasir::findOrFail($request->id_kasir);

       
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
           
          return redirect()->back()->with('success', 'Berhasil Update Data kasir');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data kasir');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }

    public function pembayaran(){
      $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter') 
                    ->leftJoin('pembayaran', 'pembayaran.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
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
                     'pembayaran.total_pembayaran',
                     'pembayaran.sudah_dibayar'
                    ) 
                    ->paginate(10); 
       
      return view('klinik.kasir.kasir',compact('pemeriksaan_arr'))->with('i');
    }

     public function searchPembayaran(Request $request)
    { 

      $query = $request->search;

      $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter') 
                    ->leftJoin('pembayaran', 'pembayaran.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
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
                     'pembayaran.total_pembayaran',
                     'pembayaran.sudah_dibayar'
                    )  
                    ->where('pasien.no_rm', 'like',"%".$query."%")
                    ->orWhere('nama_pasien','like',"%".$query."%")
                    ->groupBy('resep_obat.id_pemeriksaan')
                    ->paginate(10);; 
       
      return view('klinik.kasir.kasir',compact('pemeriksaan_arr'))->with('i');
    }

    

     public function editPembayaran($id = false)
    { 

      $id_pemeriksaan = $id;

      $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->leftJoin('resep_obat', 'resep_obat.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
                    ->leftJoin('obat', 'obat.id_obat', 'resep_obat.id_obat')
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
                     'pemeriksaan.tindakan',
                     'dokter.nama as nama_dokter', 
                     'resep_obat.status_obat as status_obat', 
                     'resep_obat.qty_obat', 
                     'resep_obat.satuan', 
                     'resep_obat.aturan_pakai', 
                     'resep_obat.harga_obat', 
                     'obat.nama_obat as nama_obat' 
                    )
                    ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                    ->get();
       
      $tindakan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)->first();

      $tindakan_all = array();
      if(isset($tindakan_arr->tindakan)){
        foreach ($tindakan_arr->tindakan as $key => $value) {
          $array = explode(' | ', $value);
          $nama = $array[0];        
          
          if(isset($array[1])){
            $harga_arr = explode('.', $array[1]);
            $harga = $harga_arr[1];

            $tindakan_all[] = array(
              'nama' => $nama,
              'harga' => $harga,
            );
          }
          
        } 
      }
      


      $pasien = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')        ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)->first();

      $transaksi = transaksi::where('id_pemeriksaan', $id_pemeriksaan)->first();

      return view('klinik.kasir.pembayaran_edit',compact('pemeriksaan_arr', 'pasien', 'tindakan_all', 'transaksi'));
    }

    public function UpdatePembayaran(Request $request){
      $check_transaksi = transaksi::where('id_pemeriksaan', $request->id_pemeriksaan)->count();

      if($check_transaksi == 0){
        $transaksi = new transaksi;
        $transaksi->id_pemeriksaan = $request->id_pemeriksaan;
        $transaksi->total_pembayaran = $request->total_pembayaran;
        $transaksi->sudah_dibayar = $request->sudah_dibayar;
         
        if($transaksi->save()){
           
          return redirect('kasir/pembayaran')->with('success', 'Berhasil Simpan Pembayaran');
        }else{ 

          return redirect('kasir/pembayaran')->with('error', 'Gagal Simpan Pembayaran');
        }
      }else{

        return redirect('kasir/pembayaran')->with('error', 'Sudah dibayar, Gagal Simpan Pembayaran');
      }
    }
    

    public function PrintPembayaran($id = false){
      $id_pemeriksaan = $id;

      $pemeriksaan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien') 
                    ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')
                    ->leftJoin('resep_obat', 'resep_obat.id_pemeriksaan', 'pemeriksaan.id_pemeriksaan')
                    ->leftJoin('obat', 'obat.id_obat', 'resep_obat.id_obat')
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
                     'pemeriksaan.tindakan',
                     'dokter.nama as nama_dokter', 
                     'resep_obat.status_obat as status_obat', 
                     'resep_obat.qty_obat', 
                     'resep_obat.satuan', 
                     'resep_obat.aturan_pakai', 
                     'resep_obat.harga_obat', 
                     'obat.nama_obat as nama_obat' 
                    )
                    ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)
                    ->get();
       
      $tindakan_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)->first();

      $tindakan_all = array();
      foreach ($tindakan_arr->tindakan as $key => $value) {
        $array = explode(' | ', $value);
        $nama = $array[0];        
        if(isset($array[1])){
            $harga_arr = explode('.', $array[1]);
            $harga = $harga_arr[1];

            $tindakan_all[] = array(
              'nama' => $nama,
              'harga' => $harga,
            );
        }
      } 


      $pasien = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')      ->leftJoin('dokter', 'dokter.id_dokter', 'pemeriksaan.id_dokter')  
              ->where('pemeriksaan.id_pemeriksaan', $id_pemeriksaan)->first();
              
      $transaksi = transaksi::where('id_pemeriksaan', $id_pemeriksaan)->first();



      return view('klinik.kasir.cetak_pembayaran',compact('pemeriksaan_arr', 'pasien', 'tindakan_all', 'transaksi'));
      
    }
}
