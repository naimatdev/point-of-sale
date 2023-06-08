<div class="modal right fade" id="editproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editproduct">Modal title       
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="product_name" id="" class="form-control" value="{{$product->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" name="description" id="" class="form-control"  value="{{$product->description}}">
                    </div>
                    {{-- 
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" name="phone" id="" class="form-control">
                    </div>
                    --}}
                    <div class="form-group">
                        <label for="">brand</label>
                        <input type="text" name="brand" id="" class="form-control"  value="{{$product->brand}}">
                    </div>
                    <div class="form-group">
                        <label for="">price</label>
                        <input type="number" name="price" id="" class="form-control"  value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label for="">quantity</label>
                        <input type="number" name="quantity" id="" class="form-control" value="{{ $product->quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="">alett_stock</label>
                        <input type="number" name="alert_stock" id="" class="form-control" value="{{ $product->alert_stock }}">
                    </div>
                    <div class="form-group">
                        <label for="">product_code</label>
                        <input type="text" name="product_code" id="" class="form-control" value="{{ $product->product_code }}">
                    </div>
                    <div class="form-group">
                        <label for="">image</label>
                        <img src="{{ asset('product/images/'.$product->product_image) }}" alt="image not loaded" width=60px>
                        <input type="file" name="product_image" id="" class="form-control" value="{{ $product->image }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-warning">Update product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><div class="modal right fade" id="editproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editproduct">Modal title       
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="product_name" id="" class="form-control" value="{{$product->product_name}}">
                    </div>
                    <div class="form-group">
                        <label for="">description</label>
                        <input type="text" name="description" id="" class="form-control"  value="{{$product->description}}">
                    </div>
                    {{-- 
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" name="phone" id="" class="form-control">
                    </div>
                    --}}
                    <div class="form-group">
                        <label for="">brand</label>
                        <input type="text" name="brand" id="" class="form-control"  value="{{$product->brand}}">
                    </div>
                    <div class="form-group">
                        <label for="">quantity</label>
                        <input type="number" name="quantity" id="" class="form-control" value="{{ $product->quantity }}">
                    </div>
                    <div class="form-group">
                        <label for="">alett_stock</label>
                        <input type="number" name="alett_stock" id="" class="form-control" value="{{ $product->alert_stock }}">
                    </div>
                    <div class="form-group">
                        <label for="">product_code</label>
                        <input type="number" name="product_code" id="" class="form-control" value="{{ $product->product_code }}">
                    </div>
                    <div class="form-group">
                        <label for="">image</label>
                        <img src="{{ asset('product/images/'.$product->product_image) }}" alt="image not loaded" width=60px>
                        <input type="file" name="image" id="" class="form-control" value="{{ $product->image }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-warning">Update product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>