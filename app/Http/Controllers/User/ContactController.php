<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mailing;

class ContactController extends Controller
{
    public function appendMessage(Request $request){
        $milis = new Mailing;
        $milis->name = $request->name;
        $milis->email = $request->email;
        $milis->phone = $request->phone;
        $milis->subject = $request->subject;
        $milis->message = $request->message;

        $milis->save();

        return redirect('');
    }
}
