<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Recaptcha;

class StoreEntry extends FormRequest
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
    public function rules(Recaptcha $recaptcha)
    {
        return [
            'firstname' => 'required|min:2',
            'lastname' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|digits:10',
            'photo' => 'required|image|max:200',
            'optin' => 'accepted:true',
            'g-recaptcha-response' => ['required', $recaptcha],
        ];
    }
}
