<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalNew extends Model
{
    use HasFactory;
    protected $table = "hospital_news";

    protected $fillable = [
        'text',
        'description',
        'name',
        'image',
    ];
}
