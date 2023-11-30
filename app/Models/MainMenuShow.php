<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenuShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_menu_show_name',
        'link'
    ];
}
