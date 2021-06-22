<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mohajon;
use App\Models\Paikar;

class SellReport extends Model
{
    use HasFactory;
    protected $table = 'sell_reports';
    
    protected $fillable = [
        'mohajon_id',
        'mohajon_address',
        'paikar_id',
        'paikar_address',
        'fish_weight',
        'price_per_kg',
        'total',
        'arot_total'
    ];

    public function mohajon(){

         return $this->belongsTo(Mohajon::class, 'mohajon_id', 'id');

     }
     public function paikar(){

         return $this->belongsTo(Paikar::class, 'paikar_id', 'id');

     }
}
