<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function register(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['min:8','confirmed'],
        ]);
        $user = User::create($validateData); 
        $token = $user->createToken("auth_token")->accessToken;
        return response()->json(
            [
                'token' => $token,
                'user' => $user,
                'message' => "User created successfully",
                'status' => 1,
            ]
            );
                // oaiejdsfoiig
    }
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);        
        $user = User::where(['email' => $validateData['email'],'password' => $validateData['password']])->first();
        $token = $user->createToken("auth_token")->accessToken;
        return response()->json(
            [
                'token' => $token, 
                'user' => $user,
                'message' => "Logeed in successfully",
                'status' => 1,
            ]
            );
    }
    public function getUser($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(
                [
                    'user' => null,
                    'message' => "User not Found",
                    'status' => 0,
                ]
                );
        }else{
            return response()->json(
                [
                    'user' => $user,
                    'message' => "User Found",
                    'status' => 1,
                ]
                );
        }
    }
}
