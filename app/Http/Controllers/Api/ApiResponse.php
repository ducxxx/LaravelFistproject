<?php

namespace App\Http\Controllers\Api;

class ApiResponse
{
    public function RESPONSE_STATUS_CODE_405()
    {
        return response()->json(['status_code' => '405', 'message' => 'Method Not Allowed'],405);
    }
    public function RESPONSE_STATUS_CODE_400()
    {
        return response()->json(['status_code' => '400', 'message: ' => 'Bad Request'],400);
    }
    public function RESPONSE_STATUS_CODE_200($data)
    {
        return response()->json(['status_code' => '200','message' => 'Successfully', 'data' => $data]);
    }
}
