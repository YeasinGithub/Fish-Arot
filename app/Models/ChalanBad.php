<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mohajon;

class ChalanBad extends Model
{
    use HasFactory;
    protected $table = 'chalan_bads';

    protected $fillable = [
        'mondir',
        'komition',
        'khajna',
        'nagad',
        'koheli',
        'somity',
        'gari_bara',
        'line_cost',
        'parking',
        'haolat',
        'ice',
        'kuli',
        'baje_cost',
        'tity_didy',
        'amanot',
        'duty',
        'total',
        'chalan_total',
        'khoros_bad'
    ];

    public function mohajon(){

         return $this->belongsTo(Mohajon::class, 'mohajon_id', 'id');

     }
}
