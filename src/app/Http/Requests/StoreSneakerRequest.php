<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSneakerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'stockx' => ['required','boolean'],
            'restocks' => ['required','boolean'],
            'image' => ['required'],
            'style' => ['required', 'max:20'],
            'cost' => ['required', 'integer'],
            'size' => ['required', 'integer'],
            'user_id' => ['exists:App\Models\User,id'],
        ];
    }
}
