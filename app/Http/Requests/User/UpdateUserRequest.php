<?php

namespace App\Http\Requests\User;

use App\Rules\Hankaku;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'user_name' => [
                'required',
                new Hankaku,
                Rule::unique('user_auths')->ignore(Auth::id()),
                Rule::unique('temporary_registrations')->ignore(Auth::id(),'user_id'),
                'min:8',
                'max:20'
            ],
            'password' => ['nullable',new Hankaku, 'min:8', 'max:50', 'confirmed'],
            'mailAddress' => ['email:strict,dns,spoof', 'min:5', 'max:100', 'nullable'],
        ];
    }
}
