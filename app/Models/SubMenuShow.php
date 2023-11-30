<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuShow extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_menu_show_id',
        'sub_menu_show_name'
    ];

    public function mainMenuShow() {
        return $this->belongsTo(MainMenuShow::class, 'main_menu_show_id');
    }
}
