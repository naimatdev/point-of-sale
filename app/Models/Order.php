<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['name' , 'address'];

    public function Orderdetail()
{
    return $this->hasMany(Order_Detail::class,'order_id');

}
}
