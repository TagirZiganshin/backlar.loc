<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\Role;
class AuthController extends Controller
{
    public function register(RegisterRequest $request){
$data = $request->validated();
$user = User::create([
    "name" => $data["name"],
    "email" => $data["email"],
    "password" => bcrypt($data["password"]),
    "id_role" => Role::where("code", "user")->first()->id
]);
$token = $user->createToken("main")->plainTextToken;
$role = Role::where("code", "user")->first()->id;
return response()->json([
"user" => $user,
"token" => $token,
"role" => $role
]);
}
public function login(LoginRequest $request){
    $data = $request->validated();
    if(!auth()->attempt($data)){
        return response([
            "message" => "неверный адрес электронной почты или пароль"
        ], 401);
    }
    $user = auth()->user();
$token = $user->createToken("main")->plainTextToken;
$role = Role::where("code", "user")->first()->id;
return response()->json([
"user" => $user,
"token" => $token,
"role" => $role
]);
}
public function logout(Request $request){
$user = $request->user();
$user->currentAccessToken()->delete();
return response("", 204);
}
}
