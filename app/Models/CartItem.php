<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'cart_id',
        'qty'
    ];

    public function menu() {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
