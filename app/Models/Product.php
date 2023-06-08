<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';
    protected $fillable = ['product_name','description', 'brand','price','quantity','barcode','qrcode','product_image',
                    'alert_stock'];

    public function Orderdetail()
{
    return $this->hasMany(Order_Detail::class,'product_id');
}
public function cart()
{
    return $this->hasMany(Cart::class,'product_id');
}
}
