<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\Organization;
use Mail;
use App\Mail\SupportEmail;

class SupportController extends Controller {
    public function getInfo(Request $request) {
        $user = auth()->user();
 
        return view('support', ['userInfo' => $user]);
    }
 
    public function sendMail(Request $request) {
        $request->validate([
            'nameInput' => 'required|string',
            'emailInput' => 'required|string',
            'titleInput' => 'required|string',
            'descriptionInput' => 'required|string',
        ]);

        //dd($request);
        if ($request->categoryInput == null) {
            return redirect()->route('support')->withErrors([
                'invalid' => 'Please select a category'
            ]);
        } 
        if ($request->titleInput == null) {
            return redirect()->route('support')->withErrors([
                'invalid' => 'Please enter a title'
            ]);
        } 
        if ($request->descriptionInput == null) {
            return redirect()->route('support')->withErrors([
                'invalid' => 'Please enter the description'
            ]);
        } 


        // $user = User::where('email', $request->only('emailInput'))->first();

        $body = [
            'name' => $request->input('nameInput'),
            'email' => $request->input('emailInput'),
            'title' => $request->input('titleInput'),
            'category' => $request->input('categoryInput'),
            'description' => $request->input('descriptionInput'),
        ];

        Mail::send(new SupportEmail($body));

        return redirect('/feedbackSuccess');
    }
 
    public function feedbackSuccess() {
        return view('supportSuccess');
    }
}