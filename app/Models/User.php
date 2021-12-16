<?php


namespace App\Models;


use App\Core\Model;
use OSN\Framework\Facades\Hash;

class User extends Model
{
    public int $uid;
    public string $name;
    public string $username;
    public string $email;
    public string $password;
    public string $passwordConfirmation;

    protected function fillable()
    {
        return ["name", "username", "email", "password", "passwordConfirmation"];
    }

    protected function rules(): array
    {
        return [
            "uid" => ["int"],
            "name" => ["required", "max:255"],
            "username" => ["required", "max:255"],
            "email" => ["email", "max:255"],
            "password" => ["required", "max:255", "min:1", "confirmed"]
        ];
    }

    public function isUnique()
    {
        $stmt = $this->db()->prepare("SELECT * FROM users WHERE username = :u OR email = :e");
        $stmt->execute([
            "e" => $this->email,
            "u" => $this->username,
        ]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        if (count($data) < 1) {
            return true;
        }

        if ($data[0]["email"] == $this->email) {
            $this->addError('email', "unique", $this->email . ' already exists');
        }

        if ($data[0]["username"] == $this->username) {
            $this->addError('username', "unique", $this->username . ' already exists');
        }

        return false;
    }


    public function save()
    {
        try {
            $stmt = $this->db()->prepare("INSERT INTO users(name, username, email, password) VALUES(:name, :username, :email, :password)");
            $stmt->execute([
                "name" => $this->name,
                "email" => $this->email,
                "username" => $this->username,
                "password" => Hash::sha1($this->password),
            ]);
        }
        catch(\PDOException $e){
            return false;
        }

        return true;
    }
}