<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        if ($validated->fails()) {
            return new JsonResponse([
                'errors' => $validated->errors()
            ], 400);
        }
        $userWithSameEmail = User::where('email', $request->email)->first();
        if ($userWithSameEmail) {
            return new JsonResponse([
                'errors' => [
                    'email' => 'El email ya existe'
                ]
            ], 400);
        }
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $user['token'] = $user->createToken('token')->plainTextToken;
        return new JsonResponse($user);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);
        if (!Auth::attempt($attr)) {
            return new JsonResponse([
                'errors' => [
                    'email' => 'El email o la contraseña son incorrectos'
                ]
            ], 400);
        }
        $token = auth()->user()->createToken('token')->plainTextToken;
        return new JsonResponse(['token' => $token]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = Validator::make(
            $request->all(),
            [
                'username' => 'required'
            ]
        );
        if ($validated->fails()) {
            return new JsonResponse([
                'errors' => $validated->errors()
            ], 400);
        }
        $response = [
            'request' => $request->all(),
            'id' => $id
        ];
        return new JsonResponse($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
