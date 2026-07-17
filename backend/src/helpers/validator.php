<?php

class Validator
{
    public static function required(array $data, array $fields): array 
    {
        $errors = [];
        foreach ($fields as $field) {
            if (!array_key_exists($field, $data) || trim((string) $data[$field]) === '') {
                $errors[] = "Field '$field' wajib diisi.";
            }
        }
        return $errors;
    }

    public static function isNumber($value): bool
    {
        return is_numeric($value);
    }

    public static function isInteger($value): bool 
    {
        return filter_var($value, FILTER_VALIDATE_INT) !== false;
    }

    public static function maxLength(string $value, int $max): bool
    {
        return mb_strlen($value) <= $max;
    }

    public static function minLength(string $value, int $min): bool
    {
        return mb_strlen($value) >= $min;
    }

    public static function isPhoneNumber(string $value): bool
    {
        return (bool) preg_match('/^(\+62|62|0)8[0-9]{8,11}$/', $value);
    }
}