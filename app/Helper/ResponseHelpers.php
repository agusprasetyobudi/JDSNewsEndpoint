<?php

namespace App\Helper;

class ResponseHelpers{


    public static function successResponse($code=200,$message,$data=null)
    {
        return [
            'error'=>false,
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        ];
    }

    public static function errorResponse($code=400,$message,$data=null)
    {
        return response()->json([
            'error'=>true,
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        ],$code);
    }

}
