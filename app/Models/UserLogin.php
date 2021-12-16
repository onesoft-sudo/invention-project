<?php


namespace App\Models;


use App\Core\Model;

class UserLogin extends Model
{
    public string $username;
    public string $password;

    protected function rules(): array
    {
        return [
            "username" => ["required", "max:255"],
            "password" => ["required", "max:255", "min:1"]
        ];
    }
}