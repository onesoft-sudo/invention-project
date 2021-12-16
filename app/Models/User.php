<?php


namespace App\Models;


use App\Core\Model;

class User extends Model
{
    public ?int $uid;
    public string $username;
    public ?string $email;
    public string $password;
    public ?string $passwordConfirmation;

    protected function rules(): array
    {
        return [
            "uid" => ["int"],
            "username" => ["required", "max:255"],
            "email" => ["email", "max:255"],
            "password" => ["required", "max:255", "min:1", "confirmed"]
        ];
    }

    public function save()
    {
        // TODO: Save model data to database
    }
}