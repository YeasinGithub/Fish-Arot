<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Paikar;

class Due extends Model
{
    use HasFactory;
    protected $table = 'due_tables';
    protected $fillable = [
        'paiker_id',
        'address',
        'due_amount_today',
        'hal',
        'total',
        'paid',
        'total_due'
    ];

    public function paikar(){

         return $this->belongsTo(Paikar::class, 'paiker_id', 'id');

     }
}
