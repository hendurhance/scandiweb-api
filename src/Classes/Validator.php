<?php

namespace Martian\Scandi\Classes;

class Validator
{
    private $data;
    private $rules;
    private $errors = [];

    public function __construct($data, $rules)
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate()
    {
        foreach ($this->rules as $field => $rule) {
            $rules = explode('|', $rule);

            foreach ($rules as $rule) {
                $this->applyRule($field, $rule);
            }
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function fails()
    {
        return !empty($this->errors);
    }

    public function validated()
    {
        $validated = [];

        foreach ($this->rules as $field => $rule) {
            if (isset($this->data[$field])) {
                $validated[$field] = $this->data[$field];
            }
        }

        return $validated;
    }

    private function applyRule($field, $rule)
    {
        $segments = explode(':', $rule);
        $ruleName = $segments[0];
        $ruleParams = isset($segments[1]) ? explode(',', $segments[1]) : [];

        $method = 'validate' . ucfirst($ruleName);

        if (method_exists($this, $method)) {
            $valid = $this->$method($field, $ruleParams);
            if (!$valid) {
                if (!isset($this->errors[$field])) {
                    $this->errors[$field] = [];
                }
                $this->errors[$field][] = "Validation failed for $field with rule $ruleName";
            }
        } else {
            $this->errors[$field][] = "Validation rule not found: $ruleName";
        }
    }

    private function validateRequired($field)
    {
        return isset($this->data[$field]) && !empty($this->data[$field]);
    }

    private function validateString($field)
    {
        return isset($this->data[$field]) && is_string($this->data[$field]);
    }

    private function validateNumeric($field)
    {
        return isset($this->data[$field]) && is_numeric($this->data[$field]);
    }

    private function validateMin($field, $params)
    {
        return isset($this->data[$field]) && strlen($this->data[$field]) >= $params[0];
    }

    private function validateMax($field, $params)
    {
        return isset($this->data[$field]) && strlen($this->data[$field]) <= $params[0];
    }

    private function validateEnum($field, $params)
    {
        return isset($this->data[$field]) && in_array($this->data[$field], $params);
    }

    private function validateRequired_if($field, $params)
    {
        $otherField = $params[0];
        $otherValue = $params[1];
        if (isset($this->data[$otherField]) && $this->data[$otherField] == $otherValue) {
            return isset($this->data[$field]) && !empty($this->data[$field]);
        }

        return true;
    }
}
