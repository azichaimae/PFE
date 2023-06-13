<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCommande extends Model
{
    use HasFactory;
    protected $table="product_commande";
    protected $fillable = [
        "product_id",
        "commande_id",
        "qte"
    ];
    public function user()
    {
        return $this->belongsTo(Statu::class);
    }
}
