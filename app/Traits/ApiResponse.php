<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    public function successResponse($data = [], $message = '', array $headers = [])
    {
        return $this->response($data, $message, Response::HTTP_OK, $headers);
    }

    public function errorResponse($data = [], $message = '', array $headers = [])
    {
        return $this->response($data, $message, Response::HTTP_UNPROCESSABLE_ENTITY, $headers);
    }

    public function response($data = [], $message = '', $code = Response::HTTP_OK, array $headers = [])
    {
        return response()->json(
            compact('code', 'message', 'data'),
            $code,
            $headers
        );
    }
}
