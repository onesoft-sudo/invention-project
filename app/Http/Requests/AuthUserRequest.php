<?php


namespace App\Http\Requests;


use OSN\Framework\Http\CustomRequestInterface;
use OSN\Framework\Http\Request;

class AuthUserRequest extends Request implements CustomRequestInterface
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
