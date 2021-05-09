<?php

namespace App\Traits;

trait ResponseTrait
{
    
    public function pangaea_response($status, $message = '', $data = [], $links = null)
    {
        $response = [
            'status' => $status,
            'message' => $message,
        ];
        if (!empty($data)) {
            if ($status === true) {
                $response['data'] = $data;
            } else {
                $response['errors'] = $data;
            }
        }
        if ($links) {
            $response['links'] = $links;
        }
        $statusCode = ($status === true) ? 200 : 400;
        return response($response, $statusCode);
    }
}