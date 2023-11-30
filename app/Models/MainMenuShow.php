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

    public function fiscalYear() {
        return $this->hasMany(FiscalYear::class, 'main_menu_show_id');
    }

    public function subMenuShow() {
        return $this->hasMany(SubMenuShow::class, 'main_menu_show_id');
    }
}
