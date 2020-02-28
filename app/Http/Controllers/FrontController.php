<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\User;
use App\Models\pasien; 
use App\Models\pemeriksaan;
use App\Models\transaksi;
use Auth;

use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    

    public function dashboard(){
        $pasien = pasien::count();
        $assesment = pemeriksaan::count(); 
        $transaksi = transaksi::count();
         
        return view('klinik.dashboard', compact('pasien', 'assesment', 'transaksi'));
    }

    public function mailer(Request $request){
        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        // Send Mail
            $mail_data = [
                'name'          => $request->name, 
                'email'             => $request->email,
                'message'              => $message, 
                'site_name'         => 'info@gentamasbali.com',
                'admin_email'       => 'info@gentamasbali.com',
                'reg_name'          => 'Klinik',
                'regards'           => 'regards',
                'mail_after_text'   => 'All rights reserved'
            ];

         // Create the mail and send it
        Mail::send('emails.massage', ['mail_data' => $mail_data], function ($m) use ($mail_data) {
            $m->from($mail_data['email'], $mail_data['site_name']);
            $m->to($mail_data['admin_email'], $mail_data['reg_name'])->subject('Pertanyaan Klinik Online');
        });

        return response()->json('success send email', 200);
    }
}
