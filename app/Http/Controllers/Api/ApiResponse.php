<?php

namespace App\Http\Controllers\Api;


class ApiResponse
{
    /**
     * error response when call incorrect method
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorMethodNotAllowed($message = null)
    {
        if (!$message) {
            $message = 'Method Not Allowed';
        }
        return response()->json(['status_code' => '405', 'message' => $message], 405);
    }

    /**
     *  error response when call incorrect request
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorBadRequest($message = null)
    {
        if (!$message) {
            $message = 'Bad Request';
        }
        return response()->json(['status_code' => '400', 'message' => $message], 400);
    }

    /**
     * successfully response
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function successfullResponse($data)
    {
        return response()->json(['status_code' => '200', 'message' => 'Successfully', 'data' => $data]);
    }
}
