<div class="modal fade" id="product_preview{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteproduct">preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>{{ $product->product_name}}</h3>
               <img src="{{ asset('product/images/'.$product->product_image) }}" alt="" width="300px" height="150px">
               <p><img src="{{ asset('product/barcodes/'.$product->barcode) }}" alt=""></p>
               <p>{{ $product->product_code}} </p>
            </div>
        </div>
    </div>
</div>