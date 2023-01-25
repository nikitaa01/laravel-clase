<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    public function helloworld()
    {
        $response = ['msg' => 'Hello Wordl!!'];
        return new JsonResponse($response, 200);
    }
}
