<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ita_main extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ita_main',
        'fiscalYear_id',
        'description_ita_main'
    ];

    public function fiscalYear() {
        return $this->belongsTo(FiscalYear::class, 'fiscalYear_id');
    }

    public function itaSub1() {
        return $this->hasMany(Ita_sub_1::class, 'itaMain_id');
    }
}
