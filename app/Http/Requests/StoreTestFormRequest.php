<?php


namespace App\Http\Requests;


use OSN\Framework\Http\AbstractRequest as Request;
use OSN\Framework\Http\RequestValidator;

class StoreTestFormRequest extends Request
{
    use RequestValidator;

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
