<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralPressRelease extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'image',
        'pdf',
        'description'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
