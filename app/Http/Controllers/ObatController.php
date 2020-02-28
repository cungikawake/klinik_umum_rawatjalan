<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\obat;
use App\User; 
use Carbon\Carbon; 

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ObatController extends Controller
{
    public function index(){
      $obat_arr = obat::paginate(10); 
      return view('klinik.obat.index',compact('obat_arr'))->with('i');
    }

    public function create(){
    	return view('klinik.obat.create');
    }

    public function store(Request $request){
    	$obat = obat::where('nama_obat')->first();
      
      if(empty($obat)){
        $obat = new obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan = $request->satuan;
        $obat->persediaan = $request->persediaan;
        $obat->harga_detail = $request->harga_detail;

        if($obat->save()){
             return redirect()->back()->with('success', 'Berhasil Menyimpan Data Obat');
        }else{
             return redirect()->back()->with('error', 'Gagal Menyimpan Data Obat');
        }
      }else{
         return redirect()->back()->with('error', 'Nama obat sudah ada');
      }  
	     
    }

    public function edit($id)
    {   
        $row = obat::findOrFail($id); 
        return view('klinik.obat.edit',compact('row'));
    }

    public function update(Request $request){
        $obat = obat::findOrFail($request->id_obat);
        $obat->nama_obat = $request->nama_obat;
        $obat->satuan = $request->satuan;
        $obat->persediaan = $request->persediaan;
        $obat->harga_detail = $request->harga_detail;

        if($obat->save()){
             return redirect()->back()->with('success', 'Berhasil Menyimpan Data Obat');
        }else{
             return redirect()->back()->with('error', 'Gagal Menyimpan Data Obat');
        }
    }

     public function search(Request $request)
    { 

      $query = $request->search;

      $obat_arr = obat::where('nama_obat','like',"%".$query."%") 
            ->paginate(10); 
       
      return view('klinik.obat.index',compact('obat_arr', 'query'))->with('i');     
    }
    
}
