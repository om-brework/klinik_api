<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        try{
            $credential = $request->validate([
                'email'=>['required','string'],
                'password'=>['required','string']
            ]);

            if(!Auth::attempt($credential)){
                $data=[
                    'message'=>'Authentication Failed'
                ];

                return response()->json($data, 500);
            }

            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('Klinik_token')->plainTextToken;
            $data = [
                'user'=>$user,
                'access_token'=>$token,
                'message'=>'Authentication Success!'
            ];
            return response()->json($data, 200);

        }catch(Exception $err){
            $data = [
                'error'=>$err,
                'message' => 'Uppsss! something went wrong'
            ];

            return response()->json($data, 500);
        }

    }
    public function register(Request $request){

        try{
            $request->validate([
                'name'=>['string', 'required','max:255'],
                'email'=>['email','required','string','max:255','unique:users'],
                'password'=>['string','required']
            ]);

            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);

            $user = User::where('email',$request->email)->first();
            $token = $user->createToken('klinikToken')->plainTextToken;

            $data = [
                'user'=>$user,
                'access_token'=>$token,
                'message'=>'Authentication Success!'
            ];
            return response()->json($data, 200);

        }catch(Exception $err){
            $data = [
                'error' => $err,
                'message' => 'Uppsss! something went wrong'
            ];

            return response()->json($data, 500);
        }
    }
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        $data=[
            'message'=> 'You are logged out, see you next time'
        ];
        return response()->json($data, 200);
    }
}
