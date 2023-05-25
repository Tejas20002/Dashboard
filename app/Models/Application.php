<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_user',
        'app_password',
        'user_id',
        'name',
        'icon',
        'url',
        'description',
        'token',
        'title_bg',
        'order'
    ];
}
