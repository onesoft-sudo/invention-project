<?php


namespace App\Http\Requests;


use OSN\Framework\Http\Request;
use OSN\Framework\Http\CustomRequestInterface;

class UpdateUserRequest extends Request implements CustomRequestInterface
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }
}
