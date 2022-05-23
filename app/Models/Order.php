<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'tb_order';
    protected $fillable = [
        'no_order',
        'qty',
        'harga',
        'total',
        'id_harga',
        'tgl',
    ];
}
