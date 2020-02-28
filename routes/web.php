<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 
 
Route::get('/', 'FrontController@index'); 
Route::get('/home', 'FrontController@index'); 
Route::post('/assets/mailer.php', 'FrontController@mailer'); 

Auth::routes(); 
Route::group(['middleware' => ['auth','active']], function () {
	Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    Route::get('/klinik', 'FrontController@dashboard');     

    Route::get('/petugas', 'PetugasController@index');     
    Route::get('/petugas/register', 'PetugasController@create');     
    Route::post('/petugas/do_register', 'PetugasController@store');     
    Route::get('/petugas/edit/{id}', 'PetugasController@edit');     
    Route::post('/petugas/edit_register', 'PetugasController@update');  


    Route::get('/farmasi', 'FarmasiController@index');     
    Route::get('/farmasi/register', 'FarmasiController@create');     
    Route::post('/farmasi/do_register', 'FarmasiController@store');     
    Route::get('/farmasi/edit/{id}', 'FarmasiController@edit');     
    Route::post('/farmasi/edit_register', 'FarmasiController@update'); 
    Route::get('/farmasi/obat', 'FarmasiController@getResep'); 
    Route::get('/farmasi/obat/do_search', 'FarmasiController@searchResep'); 
    Route::get('/farmasi/obat/edit/{id}', 'FarmasiController@EditResep'); 
    Route::post('/farmasi/obat/do_edit', 'FarmasiController@UpdateResep'); 
    Route::get('/farmasi/obat/cetak_resep/{id}', 'FarmasiController@CetakResep'); 

    Route::get('/kepala_klinik', 'KepalaKlinikController@index');     
    Route::get('/kepala_klinik/register', 'KepalaKlinikController@create');     
    Route::post('/kepala_klinik/do_register', 'KepalaKlinikController@store');     
    Route::get('/kepala_klinik/edit/{id}', 'KepalaKlinikController@edit');     
    Route::post('/kepala_klinik/edit_register', 'KepalaKlinikController@update'); 

    Route::get('/pasien', 'PasienController@index');  
    Route::get('/pasien/register', 'PasienController@create');   
    Route::get('/pasien/register/{kunjungan}', 'PasienController@create');   
    Route::post('/pasien/do_register', 'PasienController@store'); 
    Route::get('/pasien/edit/{id}', 'PasienController@edit');   
    Route::post('/pasien/edit_register', 'PasienController@update');   
    Route::get('/pasien/do_search/', 'PasienController@search');   
    Route::get('/pasien/searchAjax/', 'PasienController@searchAjax');   
    Route::post('/pasien/kunjungan/do_register', 'PasienController@storeKunjungan'); 
    Route::get('/kunjungan', 'PasienController@kunjungan'); 
    Route::get('/kunjungan/do_search/', 'PasienController@searchKunjungan');


    Route::get('/kasir', 'KasirController@index');     
    Route::get('/kasir/register', 'KasirController@create');     
    Route::post('/kasir/do_register', 'KasirController@store');     
    Route::get('/kasir/edit/{id}', 'KasirController@edit');     
    Route::post('/kasir/edit_register', 'KasirController@update'); 
    Route::get('/kasir/pembayaran', 'KasirController@pembayaran'); 
    Route::get('/kasir/pembayaran/do_search', 'KasirController@searchPembayaran'); 
    Route::get('/kasir/pembayaran/edit/{id}', 'KasirController@editPembayaran'); 
    Route::post('/kasir/pembayaran/do_register', 'KasirController@UpdatePembayaran'); 
    Route::get('/kasir/pembayaran/cetak/{id}', 'KasirController@PrintPembayaran'); 

    Route::get('/dokter', 'DokterController@index');     
    Route::get('/dokter/register', 'DokterController@create');     
    Route::post('/dokter/do_register', 'DokterController@store');     
    Route::get('/dokter/edit/{id}', 'DokterController@edit');     
    Route::post('/dokter/edit_register', 'DokterController@update'); 
 
 
    Route::get('/obat', 'ObatController@index');     
    Route::get('/obat/register', 'ObatController@create');     
    Route::post('/obat/do_register', 'ObatController@store');     
    Route::get('/obat/edit/{id}', 'ObatController@edit');     
    Route::post('/obat/edit_register', 'ObatController@update');
    Route::get('/obat/do_search/', 'ObatController@search');   

    Route::get('/tindakan', 'TindakanController@index');     
    Route::get('/tindakan/register', 'TindakanController@create');     
    Route::post('/tindakan/do_register', 'TindakanController@store');     
    Route::get('/tindakan/edit/{id}', 'TindakanController@edit');     
    Route::post('/tindakan/edit_register', 'TindakanController@update'); 
    Route::get('/tindakan/do_search/', 'TindakanController@search'); 
    Route::get('/icd10', 'TindakanController@icd10');
    Route::get('/icd10/do_search/', 'TindakanController@searchicd10'); 

    Route::get('/pemeriksaan', 'PemeriksaanController@index');        
    Route::get('/pemeriksaan/edit/{id}', 'PemeriksaanController@edit');     
    Route::get('/pemeriksaan/detail/{id}', 'PemeriksaanController@detail');     
    Route::post('/pemeriksaan/edit_register', 'PemeriksaanController@update'); 
    Route::get('/pemeriksaan/searchTindakan/', 'PemeriksaanController@searchTindakan');
    Route::get('/pemeriksaan/searchObat/', 'PemeriksaanController@searchObat');
    Route::get('/pemeriksaan/searchObatExternal/', 'PemeriksaanController@searchObatExternal');
    Route::get('/pemeriksaan/do_search/', 'PemeriksaanController@searchPemeriksaan');

    Route::get('/coding_rm', 'CodingRekamMedisController@index'); 
    Route::get('/coding_rm/do_search/', 'CodingRekamMedisController@searchPemeriksaan');
    Route::get('/coding_rm/proses/{id}', 'CodingRekamMedisController@update'); 
    Route::get('/coding_rm/searchICD10', 'CodingRekamMedisController@searchICD10');
    Route::post('/coding_rm/edit_register', 'CodingRekamMedisController@updatePemeriksaan');
    Route::get('/coding_rm/edit/{id}', 'CodingRekamMedisController@detail');

    Route::get('/laporan/kunjungan', 'LaporanController@LaporanKunjungan');
    Route::get('/laporan/obat', 'LaporanController@LaporanObat');
    Route::get('/laporan/transaksi', 'LaporanController@LaporanTransaksi');
    Route::get('/laporan/penyakit', 'LaporanController@LaporanPenyakit');
});


 