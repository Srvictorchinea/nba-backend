<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

final class UserController extends Controller
{
    public function userRegister(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|max:50',
            'email'=>'required|max:50|unique:users',
            'password'=>'required|min:5|max:8|confirmed'
        ]);
        if ($validator) {
            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $result = $user->save();
            
            if($result) {
                return response()->json([
                    'status'=>200,
                    'succes'=>true,
                    'message'=>'Your regristation has been successfully!',
                ]);
            } else {
                return response()->json([
                    'status'=>400,
                    'success'=>false,
                    'error'=>'Something went wrong',
                ]);
            }
        }else{
            return response()->json([
                'status'=>400,
                'success'=>false,
                'error'=>$validator->errors(),
            ]);
        }
    }

    public function userLogin(Request $request) {

        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'=>400,
                'success'=>false,
                'error'=>$validator->errors(),
            ]);
        } else {
            $loginEmail = array(
                'email' => $data['email'],
                'password'=> $data['password'],
            );
            $loggedin = false;
            $token = '';

            if ($log2 = Auth::attempt($loginEmail)) {
                $loggedin = true;
                $token = $log2;
            }

            if ($loggedin == false) {
                return response()->json([
                    'status'=>400,
                    'success'=>false,
                    'error'=>'Invalid Email/Password',
                ]);
            }

            $response = $this->respondWithToken($token);
            
            return response()->json($response);

        }
    }

    public function respondWithToken($token) {
        $user = Auth::user();
        $expiration = now()->addDays(config('jwt.ttl'));
        return response()->json([
            'status'=>200,
            'success'=>true,
            'message'=>'You have loggedin successfully',
            'token_type'=>'Bearer',
            'access_token'=> $token,
            'expires_at' => $expiration,
        ]);
    }
}