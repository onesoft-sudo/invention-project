<?php


namespace App\Http\Requests;


use OSN\Framework\Http\Request;
use OSN\Framework\Http\RequestValidator;

class StoreTestFormRequest extends Request
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2'],
            'username' => ['required', 'min:2'],
        ];
    }
}
