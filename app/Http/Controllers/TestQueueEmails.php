<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestSendEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestHelloEmail;

class TestQueueEmails extends Controller
{
    public function sendTestEmails()
    {
       Mail::to('iniariana09@gmail.com')->send(new TestHelloEmail);
       return "berhasil";
    }
}
