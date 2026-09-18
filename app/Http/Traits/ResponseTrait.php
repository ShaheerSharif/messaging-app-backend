<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;

class ResponseTrait
{
    protected function successJsonResponse(Model|array $data, string $message, int $status = 200, array $meta = [])
    {
        if (empty($data) || $data == null) {
            $data = [];
        } else if ($data instanceof Model) {
            $data = $data->toArray();
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'status' => $status,
            'data' => $data,
            'meta' => $meta,
        ], $status);
    }

    protected function errorJsonResponse(array $error, string $message, int $status, array $meta = [])
    {
        if (empty($error) || $error == null) {
            $error = [];
        }

        return response()->json([
            'success' => false,
            'message' => $message,
            'status' => $status,
            'error' => $error,
            'meta' => $meta,
        ], $status);
    }
}
