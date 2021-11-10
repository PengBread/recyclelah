<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function getInfo(Request $request) {
        $user = auth()->user();

        return view('support', ['userInfo' => $user]);
    }

    public function sendMail(Request $request) {
        dd($request);
        // Mail::to('test@gmail.com')
        //     ->cc()
        //     ->bcc()
        //     ->send()
    }
}
