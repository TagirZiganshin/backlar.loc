<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\HospitalNew; 
use App\Models\Comment;
use App\Models\User; 
class UserController extends Controller
{
    public function update(Request $request, $id) {
        $user = User::find($id);
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save(); 
            return response()->json(["user" => $user]);
        }
        return response()->json(false, 404); 
    }
    public function user(Request $request){
    $id = auth()->user->id;
    return response()->json(User::get()->find($id));
    }
    public function posts(){
        return response()->json(Post::with("user")->get());
    }
    public function news(){
        return response()->json(HospitalNew::get());
    }
    public function post(Request $request, $id){
        return response()->json(Post::with('hospitallink', "comment.author", 'comment.author.role', "user")->find($id));
    }
    public function new(Request $request, $id){
        return response()->json(HospitalNew::get()->find($id));
    }
    public function createcomment(Request $request, $id){
        $recentComments = Comment::where('id_user', auth()->user()->id)->where('created_at', '>=', now()->subMinutes(5))->count();
        if ($recentComments >= 5) {
            return response()->json([
                'error' => 'Вы не можете оставить больше 5 комментариев за 5 минут.'
            ], 400);
        }
        $comment = Comment::create([
            "description" => $request->description,
            "id_user" => auth()->user()->id,
            "id_post" => Post::where("id", $id)->first()->id,
        ]);

        $comment->load('author', 'author.role');
return  response()->json([
    "comment" => $comment
]);
    }
}
