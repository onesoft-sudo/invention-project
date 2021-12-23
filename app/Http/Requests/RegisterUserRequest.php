<?php


namespace App\Http\Requests;


use OSN\Framework\Http\CustomRequestInterface;
use OSN\Framework\Http\Request;

class RegisterUserRequest extends Request implements CustomRequestInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2'],
            'email' => ['required', 'email'],
            'username' => ['required', 'min:2'],
            'password' => ['required', 'min:2', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }
}
