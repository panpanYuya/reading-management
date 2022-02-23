<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        return [
            //新規登録のバリデーション
            'userName' => 'required|alpha_num|unique:App\Models\userAuth,user_name|unique:App\Models\temporaryRegistration,user_name|min:8|max:20',
            'password' => 'required|alpha_num|min:8|max:50|confirmed',
            'mailAddress' => 'email:strict,dns,spoof|min:5|max:100|nullable'
        ];
    }
}
