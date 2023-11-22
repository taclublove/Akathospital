<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ita_sub_1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'itaMain_id',
        'ita_sub_name',
        'file'
    ];

    public function itaMain() {
        return $this->belongsTo(Ita_main::class, 'itaMain_id');
    }

    public function itaSub2() {
        return $this->hasMany(Ita_sub_2::class, 'itaSub1_id');
    }
}
