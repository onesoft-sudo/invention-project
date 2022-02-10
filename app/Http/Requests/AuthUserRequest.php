<?php


namespace App\Http\Requests;


use OSN\Framework\Http\Request;
use OSN\Framework\Http\RequestValidator;

class AuthUserRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'min:2'],
            'password' => ['required', 'min:2'],
        ];
    }
}
