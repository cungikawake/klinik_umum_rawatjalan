<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request; 
use App\Models\tindakan; 
use App\Models\pasien; 
use App\Models\pemeriksaan; 
use App\Models\dokter; 
use App\Models\obat; 
use App\Models\resep_obat; 
use App\Models\icd10; 
use App\Models\assesment;  
use App\User;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers; 

class LaporanController extends Controller
{
    public function LaporanKunjungan(Request $request){
        if(isset($request->month) && isset($request->year)){ 
            $month = $request->month;
            $year = $request->year;
 
            if($month <= 9){
                $month = '0'.$month;
            }
            $to = $year.'-'.$month.'-';

        }else{ 
            $month = date('m');
            $year = date('Y');  
            $to = date('Y-m-');     
        }

        $reports = array();
        for($i = 1; $i <= 31; $i++){
            $d = $i;
            if($i <= 9){
                $d = '0'.$i;
            }
 

            $BP = DB::select("
            select tgl_kunjungan, `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Bp' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
            ");

            $reports[$i]['BP'] = $BP;

            $Kb = DB::select("
                select `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Kb' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
                ");
            $reports[$i]['Kb'] = $Kb;

            $Vac = DB::select("
                select `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Vac' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
                "); 
            $reports[$i]['Vac'] = $Vac;

            $Ph = DB::select("
                select `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Ph' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
                ");
            $reports[$i]['Ph'] = $Ph;

            $Partus = DB::select("
                select `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Partus' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
                "); 
            $reports[$i]['Partus'] = $Partus;

            $Bpg = DB::select("
                select `pelayanan`, `jaminan`, COUNT(jaminan) as qty from `pemeriksaan` where `pelayanan` = 'Bpg' and tgl_kunjungan  = '".$to.$i."' group by `jaminan`
                ");
            $reports[$i]['Bpg'] = $Bpg;
        } 
         
        if(isset($request->cetak)){
             
            return view('klinik.laporan.cetak_laporankunjungan',compact('reports', 'month', 'year'))->with('i');

        }else{
             
            return view('klinik.laporan.laporankunjungan',compact('reports', 'month', 'year'))->with('i');
        } 
    }
    
    public function LaporanObat(Request $request){
        if(isset($request->start) && isset($request->end)){ 
            $start = $request->start;
            $end = $request->end;

            $from = date('Y-m-d', strtotime($start)).' 00:00:00';
            $to = date('Y-m-d', strtotime($end)).' 23:00:00';

        }else{

            $from = date('Y-m-').'01 00:00:00';
            $to = date('Y-m-').'31 23:00:00';     
        }

        if(isset($request->cetak)){
            
            $obat_arr = resep_obat::join('obat', 'obat.id_obat', 'resep_obat.id_obat')
                        ->select(
                            'obat.nama_obat as nama_obat',
                            'resep_obat.id_pemeriksaan as id_pemeriksaan',
                            'resep_obat.qty_obat as qty_obat',
                            'resep_obat.satuan as satuan',
                            'resep_obat.harga_obat as harga_obat',
                            'resep_obat.status_resep as status_obat', 
                            'resep_obat.updated_at as updated_at' 
                        )
                        ->whereBetween('resep_obat.updated_at', [$from, $to])
                        ->orderBy('resep_obat.updated_at', 'desc')
                        ->get();

            

            return view('klinik.laporan.cetak_laporanobat',compact('obat_arr', 'from', 'to'))->with('i');
        }else{
            
            $this->validate($request, [
                'limit' => 'integer',
            ]);

            $obat_arr = resep_obat::join('obat', 'obat.id_obat', 'resep_obat.id_obat')
                        ->select(
                            'obat.nama_obat as nama_obat',
                            'resep_obat.id_pemeriksaan as id_pemeriksaan',
                            'resep_obat.qty_obat as qty_obat',
                            'resep_obat.satuan as satuan',
                            'resep_obat.harga_obat as harga_obat',
                            'resep_obat.status_resep as status_obat', 
                            'resep_obat.updated_at as updated_at' 
                        )
                        ->whereBetween('resep_obat.updated_at', [$from, $to])
                        ->orderBy('resep_obat.updated_at', 'desc')
                        ->paginate($request->limit ? $request->limit : 10);

            $obat_arr->appends($request->only('start', 'end'));

            return view('klinik.laporan.laporanobat',compact('obat_arr', 'from', 'to'))->with('i');
        } 
    } 
    
    public function LaporanTransaksi(Request $request){
        if(isset($request->start) && isset($request->end)){ 
            $start = $request->start;
            $end = $request->end;

            $from = date('Y-m-d', strtotime($start)).' 00:00:00';
            $to = date('Y-m-d', strtotime($end)).' 23:00:00';

        }else{

            $from = date('Y-m-').'01 00:00:00';
            $to = date('Y-m-').'31 23:00:00';     
        }

        if(isset($request->cetak)){
            
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
                     'pembayaran.sudah_dibayar',
                     'pemeriksaan.created_at'
                    )
                    ->whereBetween('pemeriksaan.tgl_pemeriksaan', [$from, $to])
                    ->orderBy('pemeriksaan.tgl_pemeriksaan', 'desc')
                        ->get(); 

            return view('klinik.laporan.cetak_laporantransaksi',compact('pemeriksaan_arr', 'from', 'to'))->with('i');
        }else{
            
            $this->validate($request, [
                'limit' => 'integer',
            ]);

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
                     'pembayaran.sudah_dibayar',
                     'pemeriksaan.created_at'
                    )
                    ->whereBetween('pemeriksaan.tgl_pemeriksaan', [$from, $to])
                    ->orderBy('pemeriksaan.tgl_pemeriksaan', 'desc')
                    ->paginate($request->limit ? $request->limit : 10);

            $pemeriksaan_arr->appends($request->only('start', 'end'));

            return view('klinik.laporan.laporantransaksi',compact('pemeriksaan_arr', 'from', 'to'))->with('i');
        } 
    } 

    public function LaporanPenyakit(Request $request){
        if(isset($request->start) && isset($request->end)){ 
            $start = $request->start;
            $end = $request->end;

            $from = date('Y-m-d', strtotime($start)).' 00:00:00';
            $to = date('Y-m-d', strtotime($end)).' 23:00:00';

        }else{

            $from = date('Y-m-').'01 00:00:00';
            $to = date('Y-m-').'31 23:00:00';     
        }

        if(isset($request->cetak)){
            $pemeriksaan_arr = DB::table('pemeriksaan') 
                            ->join('icd10', 'icd10.id_icd10', '=', 'pemeriksaan.id_icd_10')
                            ->select(
                                array(
                                        'pemeriksaan.id_icd_10', 
                                        'icd10.kode_penyakit', 
                                        'icd10.nama_penyakit', 
                                        DB::raw('COUNT(pemeriksaan.id_icd_10) as qty')
                                    )
                            )  
                            ->whereBetween('pemeriksaan.tgl_pemeriksaan', [$from, $to])
                            ->groupBy('pemeriksaan.id_icd_10')
                            ->orderBy('qty', 'desc')
                            ->take(10)
                            ->get();
                      
             
            return view('klinik.laporan.cetak_laporanpenyakit',compact('pemeriksaan_arr', 'from', 'to'))->with('i');
             
        }else{
            

            $pemeriksaan_arr = DB::table('pemeriksaan') 
                            ->join('icd10', 'icd10.id_icd10', '=', 'pemeriksaan.id_icd_10')
                            ->select(
                                array(
                                        'pemeriksaan.id_icd_10', 
                                        'icd10.kode_penyakit', 
                                        'icd10.nama_penyakit', 
                                        DB::raw('COUNT(pemeriksaan.id_icd_10) as qty')
                                    )
                            )  
                            ->whereBetween('pemeriksaan.tgl_pemeriksaan', [$from, $to])
                            ->groupBy('pemeriksaan.id_icd_10')
                            ->orderBy('qty', 'desc')
                            ->take(10)
                            ->get();
                      
             
            return view('klinik.laporan.laporanpenyakit',compact('pemeriksaan_arr', 'from', 'to'))->with('i');
        } 
    } 
}
