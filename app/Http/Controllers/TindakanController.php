<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\tindakan; 
use App\Models\icd10; 
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class TindakanController extends Controller
{
    public function index(){
      $tindakan_arr = tindakan::paginate(10);
      return view('klinik.tindakan.index',compact('tindakan_arr'))->with('i');
    }
 
    public function create(){
    	return view('klinik.tindakan.create');
    }

    public function store(Request $request){
    	
       	$this->validate($request, [ 
            'nama_tindakan' => 'required|string|max:255',
            'jenis_tindakan' => 'required', 
            'tarif_tindakan' => 'required|integer',
     	]);
        

     	$pelayanan = new tindakan; 
     	$pelayanan->nama_tindakan = $request->nama_tindakan;
     	$pelayanan->jenis_tindakan = $request->jenis_tindakan; 
     	$pelayanan->tarif_tindakan = $request->tarif_tindakan; 
     	
     	if($pelayanan->save()){
     		return redirect()->back()->with('success', 'Berhasil Menyimpan Data Tindakan');
     	}else{
     		return redirect()->back()->with('error', 'Gagal Menyimpan Data Tindakan');
     	}
    }

    public function edit($id)
    {   
        $row = tindakan::findOrFail($id); 
        return view('klinik.tindakan.edit',compact('row'));
    }

    public function update(Request $request)
    {   
        $this->validate($request, [ 
            'nama_tindakan' => 'required|string|max:255',
            'jenis_tindakan' => 'required', 
            'tarif_tindakan' => 'required|integer',
        ]);
        
 
        $pelayanan = tindakan::findOrFail($request->id_tindakan); 
        $pelayanan->nama_tindakan = $request->nama_tindakan;
        $pelayanan->jenis_tindakan = $request->jenis_tindakan; 
        $pelayanan->tarif_tindakan = $request->tarif_tindakan; 
        
        if($pelayanan->save()){
            return redirect()->back()->with('success', 'Berhasil Menyimpan Data Pelayanan');
        }else{
            return redirect()->back()->with('error', 'Gagal Menyimpan Data Pelayanan');
        }
    }

     public function search(Request $request)
    {	

    	$query = $request->search;

    	$tindakan_arr = tindakan::where('nama_tindakan','like',"%".$query."%") 
    				->paginate(10);

    	 
        return view('klinik.tindakan.index',compact('tindakan_arr', 'query'))->with('i');			
    }

    public function icd9(){
        $data_arr = icd9::paginate(10);
        return view('klinik.pelayanan.icd9',compact('data_arr'))->with('i');       
    }

    public function icd10(){
        $data_arr = icd10::paginate(10);
        return view('klinik.pelayanan.icd10',compact('data_arr'))->with('i');       
    }

     public function searchicd10(Request $request)
    {   

        $query = $request->search;

        $data_arr = icd10::where('nama_penyakit','like',"%".$query."%") 
                    ->paginate(10);

         
        return view('klinik.pelayanan.icd10',compact('data_arr', 'query'))->with('i');           
    }
}
