<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
        ];
        
       

        $link = request()->server()['HTTP_ORIGIN'] . request()->server()['REQUEST_URI'];

        if($link == route('profile.editName')) {
            $rules['name'] = 'bail|required|string|max:50';
        }
        else if($link == route('profile.editPhone')) {
            $rules['phoneNumber'] = 'required|regex:/(6?01)[0-9]{8,10}/';
        }
        else if($link == route('profile.editPassword')) {
            $rules['password'] = 'required|string|regex:/^[a-zA-Z0-9]{7,}$/';
        }
        else if($link == route('profile.joinOrganization')) {
            $rules['code'] = 'required|string|regex:/^[a-zA-Z0-9]{7}$/';
        }
        // dd($rules);

        return $rules;
    }
}
