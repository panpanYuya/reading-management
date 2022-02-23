<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreuserAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //この値をtrueにしないとうまく動かないので、trueにしておく。
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //新規登録のバリデーション
            'username' => 'required|alpha_num|unique:App\Models\userAuth,user_name|unique:App\Models\temporaryRegistration,user_name|min:8|max:20',
            'password' => 'required|alpha_num|min:8|max:50|confirmed',
            'mailAddress' => 'required|email:strict,dns,spoof|min:5|max:100|nullable'

        ];
    }

}
