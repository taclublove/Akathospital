<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ita_sub_3 extends Model
{
    use HasFactory;

    protected $fillable = [
        'itaSub2_id',
        'itaSub3_name',
        'file',
        'link'
    ];

    public function itaSub2() {
        return $this->belongsTo(Ita_sub_2::class, 'itaSub2_id');
    }

    public function itaSub4() {
        return $this->hasMany(Ita_sub_4::class, 'itaSub3_id');
    }

}
