<?php

namespace App\Http\Requests;

use App\Rules\Hankaku;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            //
            'password' => ['required', new Hankaku, 'min:8', 'max:50', 'confirmed'],
            'userId' => ['required', 'exists:App\Models\UserAuth,id' ],
        ];
    }
}
