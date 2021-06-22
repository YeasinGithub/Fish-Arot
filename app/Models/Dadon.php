<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dadon extends Model
{
    use HasFactory;
    
     protected $table = 'dadon_khatas';
     protected $fillable = [
        'name',
        'address',
        'date',
        'day',
        'mobile',
        'total_amount',
        'paid',
        'last_total'
    ];
}
