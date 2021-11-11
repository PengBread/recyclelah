<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class SupportController extends Controller
{
    public function getInfo(Request $request) {
        $user = auth()->user();

        return view('support', ['userInfo' => $user]);
    }

    public function sendMail(Request $request) {
        
        $catSelection = $request->categoryInput;

        if ($catSelection == null) {
            return redirect()->back()->with(['categoryInput' => 'Select a category.']);
        }

        $request->validate([
            'nameInput' => 'required|string|max:50',
            'emailInput' => 'required|string|email|max:50',
            'titleInput' => 'required|string|max:50',
            'descriptionInput' => 'required|string|max:1500',
        ]);

        $user = User::where('email', $request->only('emailInput'))->first();

        if ($user == null){
            return redirect()->back()->with(['emailInput' => 'These credentials do not match our record.']);
        }
        else{

            $body = [
                'name' => $request->input('nameInput'),
                'title' => $request->input('titleInput'),
                'description' => $request->input('descriptionInput'),
            ];

            Mail::to('pinyan2701@gmail.com')
            // pengbreadpersonal@gmail.com
                ->send(new SupportEmail($body, $request->input('emailInput')));
            return redirect('/feedbackSuccess');
        }
    }

    public function feedbackSuccess() {
        return view('supportSuccess');
    }
}