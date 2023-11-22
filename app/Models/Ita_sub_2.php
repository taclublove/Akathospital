<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ita_sub_2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'itaSub1_id',
        'itaSub2_name',
        'file'
    ];

    public function itaSub1() {
        return $this->belongsTo(Ita_sub_1::class, 'itaSub1_id');
    }

    public function itaSub3() {
        return $this->hasMany(Ita_sub_3::class, 'itaSub2_id');
    }
}
