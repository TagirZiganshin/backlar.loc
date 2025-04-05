<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\HospitalNew; 
class AdminController extends Controller
{
    
    public function createpost(Request $request){
        if ($request->hasFile('image')) {
            $Nameimage = time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path("../react/public/images/posts"), $Nameimage);
        }
        $post = Post::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
           "id_user" => auth()->user()->id, 
           "image" => $Nameimage,
        ]);
        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }
    public function createnews(Request $request){
        if ($request->hasFile('image')) {
            $Nameimage = time() . "." . $request->file('image')->extension();
            $request->file('image')->move(public_path("../react/public/images/news"), $Nameimage);
        }
        $post = HospitalNew::create([
            'name' => $request->input('name'),
            "text" => $request->input("text"),
            'description' => $request->input('description'),
           "id_user" => auth()->user()->id, 
           "image" => $Nameimage,
        ]);
        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }
}
      