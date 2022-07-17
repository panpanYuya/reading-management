<?php

namespace App\Http\Requests\User;

use App\Rules\Hankaku;
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
            'user_name' => ['required', new Hankaku,'unique:App\Models\UserAuth,user_name','unique:App\Models\TemporaryRegistration,user_name','min:8','max:20'],
            'password' => ['required', new Hankaku,'min:8','max:50','confirmed'],
            'mailAddress' => ['email:strict,dns,spoof','min:5','max:100','nullable','unique:App\Models\UserAuth,mail_address'],
        ];
    }
}
