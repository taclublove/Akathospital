<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscalYear_name',
        'main_menu_show_id'
    ];

    public function mainMenuShow() {
        return $this->belongsTo(MainMenuShow::class, 'main_menu_show_id');
    }
}
