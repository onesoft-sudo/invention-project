<?php


namespace App\Core;


class Session
{
    public function __construct()
    {
        @session_start();
    }

    public function setFromModel(Model $model, array $excludedFields = [])
    {
        foreach ($model as $field => $value) {
            if (in_array($field, $excludedFields)) {
                continue;
            }

            $this->set($field, $value);
        }
    }

    public function unsetFromModel(Model $model, array $excludedFields = [])
    {
        foreach ($model as $field => $value) {
            if (in_array($field, $excludedFields)) {
                continue;
            }

            $this->unset($field);
        }
    }

    public function setModel(string $key, Model $model)
    {
        $_SESSION[$key] = serialize($model);
    }

    public function getModel(string $key)
    {
        return unserialize($_SESSION[$key] ?? null);
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? false;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function unset($key)
    {
        $_SESSION[$key] = '';
        unset($_SESSION[$key]);
    }

    public function isset($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function getFlash()
    {
        $msg = $this->get("flash_message");

        if ($msg === false)
            return false;

        $this->unset("flash_message");
        return $msg;
    }

    public function setFlash(string $string)
    {
        $this->set("flash_message", $string);
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
    }
}