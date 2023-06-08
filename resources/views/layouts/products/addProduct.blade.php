<div class="modal right fade" id="addproduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addproduct">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="Post" enctype="multipart/form-data" autocomplete="off"> 
                    @csrf
                
                    <div class="form-group">
                        <label for="">prodcut_name</label>
                        <input type="text" name="product_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">product code</label>
                        <input type="text" name="product_code" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">brand</label>
                        <input type="text" name="brand" id="" class="form-control">
                    </div>
                 
                    {{-- 
                    <div class="form-group">
                        <label for="">phone</label>
                        <input type="number" name="phone" id="" class="form-control">
                    </div>
                    --}}
                    <div class="form-group">
                        <label for="">description</label>
                       <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for=""> price</label>
                        <input type="number" name="price" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> quantity</label>
                        <input type="text" name="quantity" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for=""> alert_stock</label>
                        <input type="number" name="alert_stock" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">product_image</label>
                        <input type="file" name="product_image" id="" class="form-control">
                    </div>
                    {{-- 
                    <div class="form-group">
                        <label for="">Select Admin role</label>
                        <select name="role" id="" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">Cashier</option>
                        </select>
                    </div>
                    --}}
            </div>
            <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>