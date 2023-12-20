<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDirector extends Model
{
    use HasFactory;
    protected $fillable = [
        'prefix_id',
        'fname',
        'lname',
        'position',
        'image',
        'user_id'
    ];

    public function prefix() {
        return $this->belongsTo(Prefix::class, 'prefix_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
