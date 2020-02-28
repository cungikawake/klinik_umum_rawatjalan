<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\pasien;
use App\Models\kunjungan;
use App\Models\pemeriksaan;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class PasienController extends Controller
{
    public function index(){

      $pasien_arr = pasien::paginate(10); 
      return view('klinik.pasien.index',compact('pasien_arr'))->with('i');
    }
 
    public function create($kunjungan = ''){
        
        if($kunjungan == 'kunjungan'){
            return view('klinik.pasien.kunjungan');
        }else{
            return view('klinik.pasien.create');    
        }
    }

    public function store(Request $request){
    	
       	$this->validate($request, [ 
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin_pasien' => 'required',
             
            'alamat_jalan' => 'required|string',
            'alamat_kecamatan' => 'required|string',
            'alamat_kabupaten' => 'required|string',
            'no_hp_pasien' => 'required|string|max:255',
            'tgl_lahir_pasien' => 'required|string|max:255',
            'umur' => 'required|string|max:255',
     	]);

        //generate RM
     	$last_no_rm = pasien::orderby('created_at', 'desc')->first();
         
        if(isset($last_no_rm->no_rm)){
            $last = $last_no_rm->no_rm;
        }else{
            $last = '00.00.00';    
        }
         
        $no_rm = explode('.', $last);
         
        $no_pasien[0] = 0;
        $no_pasien[1] = 0;
        $no_pasien[2] = 0;

        if($no_rm[2] == 00){
            $no_pasien[2] = 1;
            $no_pasien[1] = 0;
            $no_pasien[0] = 0;

        }else if($no_rm[2] == 99){
            $no_pasien[2] = 99;

            if($no_rm[1] == 00){
                $no_pasien[1] = 1;
                $no_pasien[0] = 0;

            }else if($no_rm[1] == 99){
                $no_pasien[1] = 99;
                $no_pasien[0] = 1;

                if($no_rm[0] == 00){
                    $no_pasien[2] = 99;
                    $no_pasien[1] = 99;
                    $no_pasien[0] = 1;

                }else if($no_rm[0] == 99){
                    $no_pasien[2] = 99;
                    $no_pasien[1] = 99;
                    $no_pasien[0] = $no_rm[0]+1;
                }else{
                    $no_pasien[0] = $no_rm[0]+1;
                }

            }else{
                $no_pasien[1] = $no_rm[1]+1;
            }
            

        }else{
            $no_pasien[2] = $no_rm[2]+1;
        }

        //gabung no rm
        $new_no_rm[0] = '';
        if(strlen($no_pasien[0]) > 1){
            $new_no_rm[0] = $no_pasien[0];
        }else{
            $new_no_rm[0] = '0'.$no_pasien[0];
        }

        $new_no_rm[1] = '';
        if(strlen($no_pasien[1]) == 2){
            $new_no_rm[1] = $no_pasien[1];
        }else{
            $new_no_rm[1] = '0'.$no_pasien[1];
        }

        $new_no_rm[2] = '';
        if(strlen($no_pasien[2]) == 2){
            $new_no_rm[2] = $no_pasien[2];
        }else{
            $new_no_rm[2] = '0'.$no_pasien[2];
        }

        $new_no_rm =  $new_no_rm[0].'.'.$new_no_rm[1].'.'.$new_no_rm[2]; 

     	$pasien = new pasien;
     	$pasien->no_rm = $new_no_rm;
     	$pasien->nama_pasien = $request->nama_pasien;
     	$pasien->jenis_kelamin_pasien = $request->jenis_kelamin_pasien;
     	 
        $pasien->alamat_jalan = $request->alamat_jalan;
        $pasien->alamat_kecamatan = $request->alamat_kecamatan;
        $pasien->alamat_kabupaten = $request->alamat_kabupaten;
     	$pasien->tgl_lahir_pasien = $request->tgl_lahir_pasien;
     	$pasien->umur = $request->umur;
     	$pasien->no_hp_pasien = $request->no_hp_pasien;
        $pasien->pekerjaan = $request->pekerjaan;
        $pasien->tempat_lahir = $request->tempat_lahir;
     	
     	if($pasien->save()){
     		return redirect()->back()->with('success', 'Berhasil Menyimpan Data Pasien');
     	}else{
     		return redirect()->back()->with('error', 'Gagal Menyimpan Data Pasien');
     	}
    }

    public function edit($id)
    {   
        $row = pasien::findOrFail($id); 
        return view('klinik.pasien.edit',compact('row'));
    }

    public function update(Request $request)
    {   
         $this->validate($request, [ 
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin_pasien' => 'required', 
            'alamat_jalan' => 'required|string|max:255',
            'alamat_kecamatan' => 'required|string|max:255',
            'alamat_kabupaten' => 'required|string|max:255',
            'no_hp_pasien' => 'required|string|max:255',
            'tgl_lahir_pasien' => 'required|string|max:255',
            'umur' => 'required|string|max:255',
     	]);

     	 
     	$pasien = pasien::findOrFail($request->id_pasien); 
     	$pasien->nama_pasien = $request->nama_pasien;
     	$pasien->jenis_kelamin_pasien = $request->jenis_kelamin_pasien;
     	 
        $pasien->alamat_jalan = $request->alamat_jalan;
        $pasien->alamat_kecamatan = $request->alamat_kecamatan;
        $pasien->alamat_kabupaten = $request->alamat_kabupaten;
     	$pasien->tempat_lahir = $request->tempat_lahir;
        $pasien->tgl_lahir_pasien = $request->tgl_lahir_pasien;
     	$pasien->umur = $request->umur;
        $pasien->pekerjaan = $request->pekerjaan;
     	$pasien->no_hp_pasien = $request->no_hp_pasien;
     	
     	if($pasien->save()){
     		return redirect()->back()->with('success', 'Berhasil Menyimpan Data Pasien');
     	}else{
     		return redirect()->back()->with('error', 'Gagal Menyimpan Data Pasien');
     	}
    }

     public function search(Request $request)
    {	

    	$query = $request->search;

    	$pasien_arr = pasien::where('nama_pasien','like',"%".$query."%")
    				->orWhere('no_rm','like',"%".$query."%")
    				->paginate(10);

    	return view('klinik.pasien.index',compact('pasien_arr', 'query'))->with('i');			
    }

    public function searchAjax(Request $request) {
        $query = $request->no_rm;

        $pasien_arr = pasien::where('no_rm',$query)
                    ->first();  
        return response()->json(array('pasien_arr'=> $pasien_arr), 200);
    }

    public function storeKunjungan(Request $request){
         
        $kunjungan = new pemeriksaan;
        $kunjungan->id_pasien = $request->id_pasien;
        $kunjungan->tgl_kunjungan = date('Y-m-d H:i:s');
        $kunjungan->pelayanan = $request->pelayanan;
        $kunjungan->jaminan = $request->jaminan;
        $kunjungan->no_bpjs = $request->no_bpjs;
        $kunjungan->alergi = $request->alergi;
        $kunjungan->status_pemeriksaan = 0;

        if($kunjungan->save()){
            return redirect()->back()->with('success', 'Berhasil Menyimpan Data Kunjungan');
        }else{
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Kunjungan');
        }
    }

    public function kunjungan(){
        $pasien_arr = pemeriksaan::join('pasien', 'pasien.id_pasien', 'pemeriksaan.id_pasien')
                    ->select('pasien.no_rm as no_rm',
                     'pasien.nama_pasien', 
                     'pemeriksaan.tgl_kunjungan', 
                     'pemeriksaan.jaminan', 
                     'pemeriksaan.no_bpjs', 
                     'pemeriksaan.pelayanan', 
                     'pemeriksaan.id_pemeriksaan',
                     'pemeriksaan.alergi',
                     'pemeriksaan.status_pemeriksaan')
                    ->paginate(10);
                  
        return view('klinik.pasien.data_kunjungan',compact('pasien_arr'))->with('i');
    }

     public function searchKunjungan(Request $request)
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
                     'pemeriksaan.status_pemeriksaan',
                     'pemeriksaan.alergi')
                    ->where('pasien.nama_pasien','like',"%".$query."%")
                    ->orWhere('pasien.no_rm','like',"%".$query."%")
                    ->paginate();

        return view('klinik.pasien.data_kunjungan',compact('pasien_arr', 'query'))->with('i');           
    }
}
