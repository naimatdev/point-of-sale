<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Cart;
use Livewire\Component;

class Order extends Component
{
    public $products =[], $product_code,$message = '', $productInCart;
    public $customer_name,$customer_phone;
    public $payMoney = '';
    public function mount(){
        $this->products=Product::all();
        $this->productInCart=Cart::all();
      }
public function InserToCart()
{
    $countProduct = Product::where('id', $this->product_code)->first();
    if(!$countProduct)
    {
        return $this->message= 'product not found';
    }
    $countCartProduct = Cart::where('product_id' ,$this->product_code)->count();
    if ($countCartProduct > 0)
    {
        return $this->message = 'product '. $countProduct->product_name . 'already exist in the cart';
    }
    $add_to_cart = new Cart;
    $add_to_cart->product_id = $countProduct->id;
    $add_to_cart->product_qty = 1;
    $add_to_cart->product_price = $countProduct->price;
    $add_to_cart->user_id = auth()->user()->id;
    $add_to_cart->save();

    $this->productInCart->prepend($add_to_cart);
    $this->product_code ='';
    return $this->message = "product Added successfully";
}
    public function incrementQty($cartId)
    {
        $carts =Cart::find($cartId);
        $carts->increment('product_qty', 1);
        $updatePrice =$carts->product_qty * $carts->product->price;
        $carts->update(['product_price'=>$updatePrice]);
        $this->mount();
    }
    public function decrementQty($cartId)
    {
        $carts =Cart::find($cartId);
        if($carts->product_qty ==1)
        {
            return Session()->flash('info' ,'Product '.$carts->product->product_name. 'is not less than 1 add some product or remove the product from the cart');
        }
        $carts->decrement('product_qty', 1);
        $updatePrice =$carts->product_qty * $carts->product->price;
        $carts->update(['product_price'=>$updatePrice]);
        $this->mount();

    }
    public function removeProduct($cartId)
    {
        $deleteCart = Cart::find($cartId);
        $deleteCart->delete();
        $this->message = "Product removed from cart";
        $this->productInCart = $this->productInCart->except($cartId);
    }
    public function render()
    {
    $customer_phone;

    if($this->payMoney!='')
    {
       $totall_amount= (int)$this->payMoney - $this->productInCart->sum('product_price');
       $this->balance =$totall_amount;
    }
                return view('livewire.order');
}
}