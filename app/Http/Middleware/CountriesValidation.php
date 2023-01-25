<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CountriesValidation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'Name' => 'required|string',
                'Continent' => 'required|string',
                'Region' => 'required|string',
                'SurfaceArea' => 'required|numeric|gt:0',
                'IndepYear' => 'required|numeric|gt:0',
                'Population' => 'required|numeric|gt:0',
                'LifeExpectancy' => 'required|numeric|gt:0',
                'GNP' => 'required|numeric|gt:0',
                'GNPOld' => 'required|numeric|gt:0',
                'LocalName' => 'required|string',
                'GovernmentForm' => 'required|string',
                'HeadOfState' => 'required|string',
                'Capital' => 'required|numeric|gt:0',
                'Code2' => 'required|string',
            ]
        );
        if ($validated->fails()) {
            return new JsonResponse([
                'msg' => 'BAD_REQUEST',
                'error' => $validated->errors()
            ], 400);
        } else {
            return $next($request);
        }
    }
}
