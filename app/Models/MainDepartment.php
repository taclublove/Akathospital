<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
