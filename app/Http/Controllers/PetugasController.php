<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\petugas;
use App\User; 
use Carbon\Carbon; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class PetugasController extends Controller
{
    public function index(){
      $petugas_arr = petugas::paginate(10);
       
      
      return view('klinik.petugas.index',compact('petugas_arr'))->with('i');
    }

    public function create(){
    	return view('klinik.petugas.create');
    }

    public function store(Request $request){
    	
       $this->validate($request, [ 
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
      ]);

      $User = new User;
      $petugas = new petugas;

       
      $User->name = $request->name;
      $User->email = $request->email;
      $User->password = bcrypt(trim($request->password));
      $User->active = 1;
      $User->level = 2; //petugas

      if ($User->save()) {
        $petugas->id_user =  $User->id;
        $petugas->nama = $request->name;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->no_hp = $request->no_hp;
        $petugas->tgl_lahir = date('Y-m-d', strtotime($request->tgl_lahir));

        if($petugas->save()){
           
          return redirect()->back()->with('success', 'Berhasil Menyimpan Data Petugas');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Menyimpan Data Petugas');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Menyimpan Data User');
      }  
	     
    }

    public function edit($id)
    {   
        $row = petugas::findOrFail($id);
        $user = User::findOrFail($row->id_user);
        return view('klinik.petugas.edit',compact('row', 'user'));
    }

    public function update(Request $request){
      $User = User::findOrFail($request->id_user);
      $petugas = petugas::findOrFail($request->id_petugas);

       
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
           
          return redirect()->back()->with('success', 'Berhasil Update Data Petugas');
        }else{ 
          return redirect()->back()->with('error', 'Gagal Update Data Petugas');
        }

      }else{
        return redirect()->back()->with('error', 'Gagal Update Data User');
      } 
    }
    
}
