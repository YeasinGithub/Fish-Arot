<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mohajon;

class Chalan extends Model
{
    use HasFactory;
    protected $table = 'chalans';

    protected $fillable = [
        'mohajon_id',
        'mohajon_address',
        'fish_name',
        'kg_gram',
        'rate_per_kg',
        'total_taka',
        'total_kg',
        'last_total',
        'date'
    ];

    public function mohajon(){

         return $this->belongsTo(Mohajon::class, 'mohajon_id', 'id');

     }
}
