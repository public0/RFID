<?php
namespace App\Http;

class Response {
    public function json($data): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}