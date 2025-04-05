<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller
{
public function checkrole(Request $request){
$role = ["RoleData" => auth()->user()->role];
if(auth()->user()->role->code == "admin"){
    return response()->json($role);
}
if(auth()->user()->role->code == "doctor"){
    return response()->json($role);
}
if(auth()->user()->role->code == "user"){
    return response()->json($role);
}
}
}
