<?php
namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Order_Detail;
use App\Models\Cart;
use Illuminate\Http\Request;
use DB;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        Session::put('page','cashier');

        // DB::transaction(function(){
            $products =Product::paginate(5);
            $orders =Order::all();
            // last order Details
            $last_id =Order_Detail::max('order_id');
            $order_receipt = Order_Detail::with('product', 'order')->where('order_id',$last_id)->get();
            $last_amount = Order_Detail::where('order_id', $last_id)
                    ->sum('amount');

        // echo "<pre>"; print_r($order_receipt);die;
        return view('layouts.orders.index',[
            'products'=>$products,
            'orders'=>$orders,
            'order_receipt'=>$order_receipt,
            'last_amount'=> $last_amount
        ]);
    // });

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    //   $check=  $request->all(); 
    //   dd($check);
    //     die;
        // dd($test);
        // $validated = $request->validate([
        //     'product_id' => 'required',
        //     'quantity' => 'required',
        //     'price' => 'required',
        //     'discount' => 'required',
        //     'totall' => 'required',
        //     'customer_name' => 'required',
        //     'customer_phone' => 'required',
        //     'payment_method' => 'required',
        //     'paid_amount' => 'required',
        //     'balance' => 'required'
        // ]);

            // Order Modal 
            $orders = new Order;
            $orders->name = $request->customer_name;
            $orders->address= $request->customer_phone;
        
            $orders->save();

          $order_id = $orders->id;
        // orders details Model
        for ($product_id =0; $product_id < count( $request->product_id); $product_id++)
        {
            $order_details = new Order_Detail;
            $order_details->order_id =$order_id;
            $order_details->product_id = $request->product_id[$product_id];
            $order_details->quantity = $request->quantity[$product_id];
            $order_details->unitprice = $request->price[$product_id];
            $order_details->amount = $request->totall[$product_id];
            $order_details->discount = $request->discount[$product_id];
            $order_details->save();
            // 
        }
        // Transaction Model 
        $transaction = new Transaction;
        $transaction->order_id =$order_id;
        $transaction->paid_amount = $request->paid_amount;
        $transaction->balance = $request->balance;
        $transaction->payment_method = $request->payment_method;
        $transaction->user_id = auth()->user()->id;
        $transaction->transaction_date = date('Y-m-d');
        $transaction ->transaction_amount=$order_details->amount;
        $transaction->save();
        Cart::truncate();
        // Last order History
        $products = Product::all();
        $order_details = Order_Detail::where('order_id','$order_id')->get(); 
        $orderBy =Order::where('id',$order_id)->get();
        // return view('layouts.orders.index',[
        //     'products'=>$products,
        //     'order_details'=>$order_details,
        //     'orderBy'=>$orderBy
        // ]);
     

        return redirect()-> back()->with('success','Order success'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
