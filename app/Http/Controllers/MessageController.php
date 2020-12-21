<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;


class MessageController extends Controller
{
    public function store(){
        
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]);

        Mail::to('vpacha@outlook.es')->queue(new MessageReceived($message));

        return back()->with('status', 'Recibimos tu solicitud, espera aprobación');
    }
}
