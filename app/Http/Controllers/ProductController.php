<?php

namespace App\Http\Controllers;
use Picqer\Barcode\BarcodeGeneratorJPG;
use App\Models\Product;
use Illuminate\Http\Request;
use Picqer;
use Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','products');

        //
        $products = Product::all();
        return view('layouts.products.index',['products'=>$products]);
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
    
        //product code section
        $product_code =rand(104890122, 100000000);
        $redColor = '255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents ('product/barcodes/' .$product_code.'.JPG',
        $generator->getBarcode($product_code ,$generator::TYPE_CODE_128,3,50));

        // return $request->all();
        // Product::create($request->all());
        $product=new Product;

 
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->brand=$request->brand;
        $product->price=$request->price;
        $product->quantity=$request->quantity;  
        $product->product_code=$product_code;
        $product->barcode=$product_code.'.jpg';
        $product->alert_stock=$request->alert_stock;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            // Define the original name of the file
            $imageName = $file->getClientOriginalName();
        
            // Move the uploaded image to the desired location with the original name
            $file->move(public_path('product/images'), $imageName);
        
            $product->product_image = $imageName;
        }
        $product->save();
   if($product){
       return redirect()->back()->with('success','Product Added Successfully');
   }
   return redirect()->back()->with('User Created Fail');
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $product=Product::find($id);
$product_code = $request->product_code;
    // dd($product->product_code);
    // dd($request->product_code);
        if($request-> product_code != '' && $request->product_code != $product->product_code)
        {
            // check the dublications of the product code
            $unique =Product::where('product_code', $product_code)->first();
            if($unique)
            {
                return redirect()->back()->with('error', 'the product code already exist');
            }

            if($request->barcode != '')
            {
                $barcode_path = public_path(). '/product/barcodes/' . $request->barcode;
                unlink($barcode_path);
            }

           
            $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
            file_put_contents ('product/barcodes/' .$product_code.'.JPG',
            $generator->getBarcode($product_code ,$generator::TYPE_CODE_128,3,50));
            $product->barcode=$product_code.'.jpg';

        }
    
            if ($request->hasFile('product_image')) {
                if ($request->product_image != '') {
                    $image = public_path('product/images/') . $request->product_image;
                    if (file_exists($image)) {
                        unlink($image);
                    }
                }
                $file = $request->file('product_image');
                // Define the original name of the file
                $imageName = $file->getClientOriginalName();
                // Move the uploaded image to the desired location with the original name
                $file->move(public_path('product/images'), $imageName);
                $product->product_image = $imageName;
            }

        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->brand=$request->brand;
        $product->price=$request->price;
        $product->product_code=$product_code;

        $product->quantity=$request->quantity;
        $product->alert_stock=$request->alert_stock;
        $product->save();
       
        if(!$product)
        {
            return back()->with('error');
        }
    
        return back()->with('success', 'the upated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $products =Product::find($id);
        if(!$products)
        {
            return back()->with("Error Delete");
        }
         $products->delete();

        return redirect()-> back()->with('Delete' ,'Successfully Deleted');
    }
    public function getProductBarcodes()
    {
        Session::put('page','barcode');
        
        $productsBarcode =Product::Select('barcode','product_code')->get();
        return view('layouts.products.barcode.index', compact('productsBarcode')); 

    }
}
