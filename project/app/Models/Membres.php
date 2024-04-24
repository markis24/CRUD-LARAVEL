<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membres extends Model
{
    use HasFactory;
        protected $fillable = ['name', 'last_name', 'email', 'image_path', 'links', 'cv_path', 'description'];

}
