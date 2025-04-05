<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $table = "comments";
    protected $fillable = [
        'description',
        "id_user",
        "id_post",
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'id_user'); 
    }
}
