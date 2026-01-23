<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fighter extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "nickname",
        "weight_class",
        "wins",
        "losses",
        "image_url",
    ];
}
