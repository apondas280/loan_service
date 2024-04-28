<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BaseController extends Controller
{
    public static function sendRes($msg, $result = '')
    {
        $res = [
            'status' => true,
            'msg'    => $msg,
        ];
        
        if($result){
            $res['data'] = $result;
        }
        return response()->json($res, 200);
    }

    public static function sendErr($err, $errMsg = [], $code = 404)
    {
        $res = [
            'status' => false,
            'msg'    => $err,
        ];

        if (! empty($errMsg)) {
            $res['data'] = $errMsg;
        }
        return response()->json($res, $code);
    }

    public static function upload_file($file, $path = null)
    {
        if ($file) {
            $file_name = Str::random(20) . '.' . $file->extension();
            $path      = 'public/upload/' . $path;
            $file->move($path, $file_name);
            return asset($path . '/' . $file_name);
        }
    }
}
