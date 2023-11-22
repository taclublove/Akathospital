<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ita_sub_4 extends Model
{
    use HasFactory;

    protected $fillable = [
        'itaSub3_id',
        'itaSub4_name',
        'file'
    ];

    public function itaSub3() {
        return $this->belongsTo(Ita_sub_3::class, 'itaSub3_id');
    }
}
