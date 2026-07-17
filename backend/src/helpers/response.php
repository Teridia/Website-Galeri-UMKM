<?php

class Response
{

    private static function send(bool $status, $data, string $message, int $code): void
    {
        header('Content-Type: application/json; charset=UTF-8');
        http_response_code($code);
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit();
    }

    public static function success($data = null, string $message = 'Success', int $code = 200): void
    {
        self::send(true, $data, $message, $code);
    }

    public static function error(string $message = 'Error', int $code = 400, $data = null): void
    {
        self::send(false, $data, $message, $code);
    }

    public static function created($data = null, string $message = 'Berhasil dibuat.'): void
    {
        self::send(true, $data, $message, 201);
    }

    public static function notImplemented(string $feature): void
    {
        self::error("$feature belum tersedia", 501);
    }
}