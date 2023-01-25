<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

function validateNum1Num2($num1, $num2, $rules)
{
    $values = [
        'num1' => $num1,
        'num2' => $num2
    ];
    return Validator::make(
        $values,
        $rules
    );
}

class CalculadoraController extends Controller
{
    public function suma($num1, $num2)
    {
        $validated = validateNum1Num2($num1, $num2, [
            'num1' => 'numeric|integer|gte:0|required',
            'num2' => 'numeric|integer|gte:0|required'
        ]);
        $commonResponse = [
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'suma'
        ];
        if ($validated->fails()) {
            return new JsonResponse([
                'params' => $commonResponse,
                'errors' => $validated->errors()
            ], 400);
        }
        return new JsonResponse([
            'params' => $commonResponse,
            'resultado' => $num1 + $num2
        ]);
    }
    public function resta($num1, $num2)
    {
        $validated = validateNum1Num2($num1, $num2, [
            'num1' => 'numeric|integer|required',
            'num2' => 'numeric|integer|required'
        ]);
        $commonResponse = [
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'resta'
        ];
        if ($validated->fails()) {
            return new JsonResponse([
                'params' => $commonResponse,
                'errors' => $validated->errors()
            ], 400);
        }
        return new JsonResponse([
            'params' => $commonResponse,
            'resultado' => $num1 - $num2
        ]);
    }
    public function multiplicacion($num1, $num2)
    {
        $validated = validateNum1Num2($num1, $num2, [
            'num1' => 'numeric|required',
            'num2' => 'numeric|required'
        ]);
        $commonResponse = [
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'multiplicacion'
        ];
        if ($validated->fails()) {
            return new JsonResponse([
                'params' => $commonResponse,
                'errors' => $validated->errors()
            ], 400);
        }
        return new JsonResponse([
            'params' => $commonResponse,
            'resultado' => $num1 * $num2
        ]);
    }
    public function division($num1, $num2)
    {
        $validated = validateNum1Num2($num1, $num2, [
            'num1' => 'numeric|required',
            'num2' => 'numeric|not_in:0|required'
        ]);
        $commonResponse = [
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'division'
        ];
        if ($validated->fails()) {
            return new JsonResponse([
                'paras' => $commonResponse,
                'errors' => $validated->errors()
            ], 400);
        }
        return new JsonResponse([
            'params' => $commonResponse,
            'resultado' => $num1 / $num2
        ]);
    }
    public function potencia($num1, $num2)
    {
        $validated = validateNum1Num2($num1, $num2, [
            'num1' => 'numeric|integer|min:0|max:5|required',
            'num2' => 'numeric|integer|min:0|max:5|required'
        ]);
        $commonResponse = [
            'num1' => $num1,
            'num2' => $num2,
            'operacion' => 'potencia'
        ];
        if ($validated->fails()) {
            return new JsonResponse([
                'params' => $commonResponse,
                'errors' => $validated->errors()
            ], 400);
        }
        return new JsonResponse([
            'params' => $commonResponse,
            'resultado' => $num1 ** $num2
        ]);
    }
}
