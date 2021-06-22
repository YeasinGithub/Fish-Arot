<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mohajon extends Model
{
    use HasFactory;

    protected $fillable = [
        'mohajon_name',
        'address',
        'status'
    ];
}
