<?php

namespace App\Http\Response;

trait Result
{
    function successResult($message = null): array
    {
        return [
            'success' => true,
            'message' => $message ?: 'Action successfully',
            'status' => 200
        ];
    }

    function failResult($message = null): array
    {
        return [
            'success' => false,
            'message' => $message ?: 'Action fail',
            'status' => 500
        ];
    }
}
