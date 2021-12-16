<?php


namespace App\Core;


abstract class Model
{
    private array $__errors = [];
    abstract protected function rules(): array;

    public function __construct(?array $data = null)
    {
        if ($data != null)
            $this->load($data);
    }

    protected function addError($field, $rule, $errmsg)
    {
        $this->__errors[$field][$rule] = $errmsg;
    }

    public function getErrors(): array
    {
        return $this->__errors;
    }

    public function hasErrors(): bool
    {
        return empty($this->__errors);
    }

    protected function db()
    {
        return App::db();
    }

    public function validate(): bool
    {
        $rules = $this->rules();


        foreach ($rules as $field => $ruleList) {
            $fillables = $this->fillable();

            if ($fillables !== false && !in_array($field, $fillables))
                continue;

            $value = $this->{$field};

            foreach ($ruleList as $rule) {

                if ($rule === "int" && isset($this->{$field}) && !filter_var($value, FILTER_VALIDATE_INT)) {
                    $this->addError($field, $rule, "The $field must be an integer");
                }

                if ($rule === "float" && isset($this->{$field}) && !filter_var($value, FILTER_VALIDATE_FLOAT)) {
                    $this->addError($field, $rule, "The $field must be a float");
                }

                if ($rule === "number" && isset($this->{$field}) && !($value === 0 || filter_var($value, FILTER_VALIDATE_FLOAT) || filter_var($value, FILTER_VALIDATE_INT))) {
                    $this->addError($field, $rule, "The $field must be a valid number");
                }

                if (preg_match("/max:\d+/", $rule)) {
                    $pos = strpos($rule, ":") + 1;
                    $maxValue = substr($rule, $pos);

                    if (strlen($value) > $maxValue) {
                        $this->addError($field, "max", "The maximum length of $field must be $maxValue");
                    }
                }

                if (preg_match("/min:\d+/", $rule)) {
                    $pos = strpos($rule, ":") + 1;
                    $minValue = substr($rule, $pos);

                    if (strlen($value) < $minValue) {
                        $this->addError($field, "min", "The minimum length of $field must be $minValue");
                    }
                }

                if ($rule === "email" && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($field, $rule, "The $field must be an email");
                }

                if ($rule === "required" && trim($value) == '') {
                    $this->addError($field, $rule, "The $field is required");
                }

                if ($rule === "confirmed") {
                    $newField = $field . "Confirmation";

                    if (!isset($this->$newField) || $value !== $this->$newField) {
                        $this->addError($newField, $rule, "The $field confirmation must be same as $field");
                    }
                }
            }
        }

        if (!empty($this->getErrors())) {
            return false;
        }

        return true;
    }

    protected function fillable()
    {
        return false;
    }

    public function load(array $data, bool $fillall = false)
    {
        $fillables = $this->fillable();
        foreach ($data as $key => $value) {
            if ($fillall === false && $fillables !== false && !in_array($key, $fillables))
                continue;

            $this->{$key} = $value;
        }
    }
}