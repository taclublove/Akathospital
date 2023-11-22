<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class precurementAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'pa_date',
        'pa_title',
        'user_id',
    ];

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }
}
