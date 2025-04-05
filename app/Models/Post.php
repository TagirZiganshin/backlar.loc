<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $table = "posts";
    protected $fillable = [
        'name',
        'description',
        "hospital_link", 
        "id_user",
        'image',
    ];
    public function hospitallink(){
        return $this->hasMany(HospitalLink::class, "id_post");
    }
    public function comment(){
        return $this->hasMany(Comment::class, "id_post");
    }
    public function user(){
        return $this->hasOne(User::class, "id", "id_user");
    }
}
