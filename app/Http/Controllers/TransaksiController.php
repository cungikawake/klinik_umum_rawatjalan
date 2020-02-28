<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\pelayanan;
use App\Models\assesment;
use App\Models\transaksi; 
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class TransaksiController extends Controller
{
    public function index(){
        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi'
                    )
                    ->orderBy('assesment.created_at', 'Asc')
                    ->paginate(10); 
      return view('klinik.transaksi.index',compact('pasien_arr'))->with('i');
    }

    public function edit($id = ''){
        if(!empty($id)){
             $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',
                        'pelayanan.jenis_pelayanan as jenis_pelayanan',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi'
                    )
                    ->where('transaksi.id_transaksi', $id)
                    ->first();
            return view('klinik.transaksi.edit',compact('pasien_arr'))->with('i');
        }else{
            return redirect('klinik')->with('status', 'Data Tidak Ditemukan');
        }
    }
    
    public function store($id = ''){
        if($id){
            $transaksi = transaksi::findOrFail($id);
            $transaksi->status_transaksi = 1;
            $transaksi->save();
            return redirect()->back()->with('success', 'Berhasil Di Bayar.');
        }else{
            return redirect('klinik')->with('status', 'Data Tidak Ditemukan');
        }
    }

    public function cetak($id = ''){
        if($id){
            $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->join('fisioterapi', 'fisioterapi.id_fisioterapi', 'assesment.id_fisioterapi')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',
                        'pelayanan.jenis_pelayanan as jenis_pelayanan',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi',

                        'fisioterapi.nama as nama_fisioterapi'
                    )
                    ->where('transaksi.id_transaksi', $id)
                    ->first();
            return view('klinik.transaksi.cetak',compact('pasien_arr'))->with('i');
        }else{
            return redirect('klinik')->with('status', 'Data Tidak Ditemukan');
        }
    }

     public function search(Request $request)
    {   

        $query = $request->search;

        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi'
                    )
                    ->where('pasien.nama_pasien','like',"%".$query."%")
                    ->orWhere('pasien.no_rm','like',"%".$query."%")
                    ->paginate();

        return view('klinik.transaksi.index',compact('pasien_arr', 'query'))->with('i');           
    }

    public function lap_fisioterapi(Request $request){
         
        if(isset($request->start) && isset($request->end)){ 
            $start = $request->start;
            $end = $request->end;

            $from = date('Y-m-d', strtotime($start)).' 00:00:00';
            $to = date('Y-m-d', strtotime($end)).' 23:00:00';

        }else{

            $from = date('Y-m-').'01 00:00:00';
            $to = date('Y-m-').'31 23:00:00';     
        }
        
         
        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->join('fisioterapi', 'fisioterapi.id_fisioterapi', 'assesment.id_fisioterapi')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',
                        'assesment.diagnosa_fisioterapi as diagnosa_fisioterapi',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',

                        'fisioterapi.nama as nama_fisioterapi',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi'
                    )
                    ->whereBetween('assesment.created_at', [$from, $to])
                    ->paginate();

        if(isset($request->cetak)){
            return view('klinik.transaksi.cetak_lap_fisioterapi',compact('pasien_arr', 'from', 'to'))->with('i');
        }else{  
            return view('klinik.transaksi.lap_fisioterapi',compact('pasien_arr', 'from', 'to'))->with('i');    
        }
        
    }

    public function lap_transaksi(Request $request){
         
        if(isset($request->start) && isset($request->end)){ 
            $start = $request->start;
            $end = $request->end;

            $from = date('Y-m-d', strtotime($start)).' 00:00:00';
            $to = date('Y-m-d', strtotime($end)).' 23:00:00';

        }else{

            $from = date('Y-m-').'01 00:00:00';
            $to = date('Y-m-').'31 23:00:00';     
        }
        
         
        $pasien_arr = assesment::join('pasien', 'pasien.no_rm', 'assesment.no_rm') 
                    ->join('pelayanan', 'pelayanan.id_pelayanan', 'assesment.id_pelayanan')
                    ->join('transaksi', 'transaksi.id_assesment', 'assesment.id_assesment')
                    ->join('fisioterapi', 'fisioterapi.id_fisioterapi', 'assesment.id_fisioterapi')
                    ->select(
                        'pasien.no_rm as no_rm', 
                        'pasien.nama_pasien', 
                        'pasien.jenis_kelamin_pasien as jenis_kelamin_pasien', 
                        'pasien.tgl_lahir_pasien as tgl_lahir_pasien', 
                        'pasien.umur as umur', 
                        'pasien.no_hp_pasien as no_hp_pasien', 
                        'pasien.alamat_pasien as alamat_pasien', 

                        'assesment.tgl_terapi as tgl_terapi', 
                        'assesment.created_at as created_at', 
                        'assesment.id_pelayanan as id_pelayanan', 
                        'assesment.id_assesment as id_assesment',
                        'assesment.diagnosa_fisioterapi as diagnosa_fisioterapi',

                        'pelayanan.nama_pelayanan as nama_pelayanan', 
                        'pelayanan.tarif_pelayanan as tarif_pelayanan',

                        'fisioterapi.nama as nama_fisioterapi',
 
                        'transaksi.total_harga as total_harga', 
                        'transaksi.status_transaksi as status_transaksi', 
                        'transaksi.id_transaksi as id_transaksi'
                    )
                    ->whereBetween('assesment.created_at', [$from, $to])
                    ->paginate();

        if(isset($request->cetak)){
            return view('klinik.transaksi.cetak_lap_transaksi',compact('pasien_arr', 'from', 'to'))->with('i');
        }else{  
            return view('klinik.transaksi.lap_transaksi',compact('pasien_arr', 'from', 'to'))->with('i');    
        }
        
    }
}
