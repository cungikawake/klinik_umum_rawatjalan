<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\fisioterapis;
use App\User; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class FisioterapiController extends Controller
{
    public function index(){
      $petugas_arr = fisioterapis::paginate(10);
      return view('klinik.fisioterapi.index',compact('petugas_arr'))->with('i');
    }

    public function create(){
    	return view('klinik.fisioterapi.create');
    }

    public function store(Request $request){
    	
      $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      $User = new User;
      $petugas = new fisioterapis;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 3; //fisioterapi

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tahun_mulai_kerja = $request->tahun_mulai_kerja;
        $petugas->sipf = $request->sipf;

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data fisioterapi');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data fisioterapi');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = fisioterapis::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.fisioterapi.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = fisioterapis::findOrFail($request->id_fisioterapi);

       
      $User->name = $request->name;
      $User->email = $request->email; 

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tahun_mulai_kerja = $request->tahun_mulai_kerja;
        $petugas->sipf = $request->sipf;
        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Update Data fisioterapi');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data fisioterapi');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }
    
}
