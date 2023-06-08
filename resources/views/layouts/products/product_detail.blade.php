<div class="row">
    @forelse ($product_detail as $product)
        <div class="col-md-12">
            <div class="form-group">
           
                <a href=""data-toggle="modal" data-target="#product_preview{{ $product->id }}" >
                <img src="{{ asset('product/images/'.$product->product_image) }}" alt="" width="200px">
            </a>

                <input type="text" name="" id="" value="{{ $product->id }}" class="form-control" readonly>
            </div>    
        </div>    
        <div class="col-md-12">
            <div class="form-group">
                <label for="">pro name</label>
                <input type="text" name="" id="" value="{{ $product->product_name }}" class="form-control" readonly>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">pro price</label>
                <input type="text" name="" id="" value="{{ $product->price }}" class="form-control" readonly>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">pro quantity</label>
                <input type="text" name="" id="" value="{{ $product->quantity }}" class="form-control" readonly>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">pro alert stock</label>
                <input type="text" name="" id="" value="{{ $product->alert_stock }}" class="form-control" readonly>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">pro description</label>
                <textarea type="text" name="" id="" value="{" class="form-control" readonly cols="3" rows="2" class="form-control"> 
                  {{  $product->description  }}</textarea>
            </div>        
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">poduct barcode</label>
                <img src="{{ asset('product/barcodes/'.$product->barcode) }}" alt="" width="200px" class="m-3">
                <p class="text-center">{{ $product->product_code }}</p>
            </div> 
            @include('layouts.products.product_preview')
    @empty
        
    @endforelse
</div>