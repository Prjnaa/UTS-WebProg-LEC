<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    const MAX_LENGTH = 'max:255';

    public function rules(): array
    {
        return [
            'first_name' => ['string', self::MAX_LENGTH],
            'last_name' => ['string', self::MAX_LENGTH],
            'email' => ['email', self::MAX_LENGTH, Rule::unique(User::class)->ignore($this->user()->id)],
            'birth_date' => ['required', 'date', 'date_format:Y-m-d']
        ];
    }
}
