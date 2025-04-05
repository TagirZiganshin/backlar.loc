<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalLink extends Model
{
    use HasFactory;
    protected $table = "hospital_links";
    public $timestamps = false;
    protected $fillable = [
        'name',
        'link',
        'id_post',
    ];
}
