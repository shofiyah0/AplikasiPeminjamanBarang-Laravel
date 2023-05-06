<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use DB;

use App\Jobs\TestSendEmail;

class EmailController extends Controller
{
    public function create()
    {

        // list query untuk munculkan semua akun email
        // limit 5 berfungsi untuk membatasi hasil row yang diquery.
      // kalo mau munculi semua , hapus limit()

        $user = User::OrderBy('email' , 'ASC')->limit(5)->get();

        return view('email' , compact('user'));

        // return $user;
    }


    public function kirim_email(Request $request)
    {

      $request->validate([
          'email' => 'required',
          'subject' => 'required',
          // 'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          // 'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];


      // cek apakah jenis kiriman emailnya ke semua
        if ($request->email == "all") {

          // list query untuk munculkan semua akun email
          // limit 5 berfungsi untuk membatasi hasil row yang diquery.
          // kalo mau munculi semua , hapus limit()
          
          $semua_user = User::OrderBy('email' , 'ASC')->limit(5)->get();

          foreach($semua_user AS $val_semua_user)
          {

            $data = array(
              'email' => $val_semua_user->email,
              'subject' => $request->subject,
              'content' => $request->content
            );

            
            dispatch(new TestSendEmail($data));

            // kasih jeda

            sleep(5);

          }
        }
        else
        {

          $data = $request->all();
          
          dispatch(new TestSendEmail($data));
        }

        return back()->with(['message' => 'Email successfully sent!']);

      }

  
}