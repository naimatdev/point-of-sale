<div class="modal right fade" id="deleteproduct{{ $product->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteproduct">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        {{-- 
                        <h3>are you sure to delete {{ $product->name }}?</h3>
                        --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" data-dismiss="modal" class="btn btn-primary">cancel</button>
                        <button type="submit" name="submit" class="btn btn-danger">delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>