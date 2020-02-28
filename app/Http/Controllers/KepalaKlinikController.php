<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\kepala_klinik;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class KepalaKlinikController extends Controller
{
    public function index(){
      $petugas_arr = kepala_klinik::paginate(10);
      return view('klinik.kepala_klinik.index',compact('petugas_arr'))->with('i');
    }

    public function create(){
    	return view('klinik.kepala_klinik.create');
    }

    public function store(Request $request){
    	
      $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);
 

      $User = new User;
      $petugas = new kepala_klinik;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 6; //kepala klinik

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir;

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data Kepala Klinik');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data Kepala Klinik');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = kepala_klinik::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.kepala_klinik.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = kepala_klinik::findOrFail($request->id_kepala_klinik);

       
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
           
          return redirect()->back()->with('success', 'Berhasil Update Data Kelapa Klinik');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data Kepala Klinik');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }
    
}
