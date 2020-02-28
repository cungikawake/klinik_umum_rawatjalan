<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\dokter;
use App\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class DokterController extends Controller
{
    public function index(){
      $petugas_arr = dokter::paginate(10);
      return view('klinik.dokter.index',compact('petugas_arr'))->with('i');
    }

    public function create(){ 
    	return view('klinik.dokter.create');
    }

    public function store(Request $request){
    	
      $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      $User = new User;
      $petugas = new dokter;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 5; //dokter

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir; 
        $petugas->gelar = $request->gelar; 

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data dokter');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data dokter');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = dokter::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.dokter.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = dokter::findOrFail($request->id_dokter);

       
      $User->name = $request->name;
      $User->email = $request->email; 

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = $request->tgl_lahir; 
        $petugas->gelar = $request->gelar; 

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Update Data dokter');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data dokter');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }
    
}
