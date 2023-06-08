<div class="col-lg-12">
    <div class="row">
        <div class="card col-md-8">
            <div class="card-header bg-primary ">
                <h4>ordered Products</h4>
                <a href="#" style="float: right;" class="btn btn-dark"  data-toggle="modal" data-target="#addproduct">
                <i class="fa fa-plus"></i>Add New Product</a>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('info'))
            <div class="alert alert-warning" role="alert">
                {{ session('info') }}
            </div>
            @endif 
            @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif 
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body ">
                <div class="my-2">
                    <form  wire:submit.prevent="InserToCart">
                        @csrf
                        <input type="text" name="product_code" wire:model="product_code" id="" placeholder="Enter the Product Code" class="form-control">
                    </form>
                    <div class="alert alert-success">
                        <ul>
                            {{$message}}
                        </ul>
                    </div>
                    {{-- {{ $productInCart }} --}}
                </div>
                <table class="table table-bordered table-left bg-secondary text-white ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product </th>
                            <th>Qty</th>
                            <th>price</th>
                            <th>DISC %</th>
                            <th>totall</th>
                            <th>
                                <a href="#" style="float: right;" class="btn btn-primary text-white add_more rounded-circle"  ><i class="fa fa-plus"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="addMoreProduct">
                        <tr>
                            @foreach ($productInCart as $key=> $cart)
                            <td colspan="1">{{$key +1}}</td>
                            <td colspan="1">
                                <input type="text" name="" id="" value="{{ $cart->product->product_name }}">
                                </select>
                            </td>
                            <td width ="14%">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button wire:click.prevent="incrementQty({{ $cart->id }})" class="btn btn-sm btn-success">+</button>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="">&nbsp;&nbsp;{{ $cart->product_qty }}</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <button  wire:click.prevent="decrementQty({{ $cart->id }})" class="btn btn-sm btn-danger">-</button>
                                    </div>
                                </div>
                            </td>
                            <td colspan="1"><input class="col-md-12  form-control price" type="number"  id="price" value="{{ $cart->product->price }}"></td>
                            <td colspan="1"><input class="col-md-12 form-control discount" type="number" value="{{ old('discount[]') ? old('discount[]') : 1 }}"></td>
                            <td colspan="1"><input class="col-md-12  form-control totall" type="number"   value="{{ $cart->product_qty * $cart->product->price }}"></td>
                            </td>
                            <td>
                                <a href="#" style="float: right;" class="btn btn-danger " wire:click="removeProduct({{ $cart->id }})" ><i class="fa fa-times text-white rounded-circle" ></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      
            <div class="col-md-4">
                <div class="card ">
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf
                        {{-- store data hidden  --}}
                        @foreach ($productInCart as $key=> $cart)
                        <input type="hidden" name="product_id[]" id="" value="{{ $cart->product->id}}">
                        <input type="hidden" name="quantity[]" value="{{ $cart->product_qty }}" id="">
                        <input class="col-md-12  form-control price" type="hidden" name="price[]" id="price[]" value="{{ $cart->product->price }}">
                        <input class="col-md-12 form-control discount" type="hidden" value="1" name="discount[]" id="discount">
                        <input class="col-md-12  form-control totall" type="hidden" name="totall[]"  value="{{ $cart->product_qty * $cart->product->price }}">
                        @endforeach
                    
                    <div class="card-header bg-success">
                        <h3 >Totall :{{ $productInCart->sum('product_price') }} <span class=""></span></h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" id="parent-div-btn">
                            <button type="button" name="" id="" class="btn btn-dark" onclick ="printRecieptContent('print')">print <i class="fa fa-print" ></button></i>&nbsp;
                            <button type="submit" name="" id="" class="btn btn-primary" > History<i class="fa fa-history"></button></i>&nbsp;
                            <button type="submit" name="" id="" class="btn btn-danger" >report <i class="fa fa-chart"></button></i>
                        </div>
                        <br>
                        <div class="row bg-light">
                            <div class="form-group col-md-6">
                                <label for=""> Customer</label>
                                <input type="text" wire:model="customer_name" name="customer_name" id="" class="form-control" value="{{ old('customer_name') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for=""> phone</label>
                                <input type="number" name="customer_phone" wire:model="customer_phone" id="" class="form-control"  value="{{ old('customer_phone') }}">
                            </div>
                        </div>
                        <div>
                            <input type="radio" name="payment_method" id="" value="cash" required value="{{ old('payment_method') }}">Cash <i class="fa fa-money-bill text-success"></i>
                            <input type="radio" name="payment_method" id="" value="Bank" required value="{{ old('payment_method') }}">Bank transfer <i class="fa fa-university text-danger"></i>
                            <input type="radio" name="payment_method" id="" value="Credit Card" class="" required value="{{ old('payment_method') }}"> Credit Card <i class="fa fa-credit-card text-info" aria-hidden="true"></i> 
                        </div>
                        <div class="">
                            <div class="form-group ">
                                <label for=""> Pay amount</label>
                                <input type="number" wire:model ="payMoney" name="paid_amount" id="paid_amount" class="form-control paid_amount" value="{{ old('paid_amount') }}">
                                @error('paid_amount')
                                <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="">
                                <div class="form-group ">
                                    <label for=""> Returning To The Customer</label>
                                    <input type="number" wire:model="balance" name="balance" id="balance" class="form-control balance">
                                </div>
                            </div>
                        </div>
                        <div>
                            <br>
                            {{-- <a href="" class="btn btn-success col-md-12">Save</a> --}}
                            <input type="submit" name="submit" id="save" class="btn btn-success col-md-12">
                            <br><br>
                            <button class="btn btn-danger col-md-12">caculator</button>
                        </div>
                    </div>
                </form>
                </div>
        
            </div>


    </div>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <!-- Add New product -->
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
                    <form action="{{ route('products.store') }}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label for="">prodcut_name</label>
                            <input type="text" name="product_name" id="" class="form-control">
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
                            <input type="text" name="description" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> price</label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> quantity</label>
                            <input type="number" name="quantity" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> alert_stock</label>
                            <input type="number" name="alert_stock" id="" class="form-control">
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
    {{-- modal ended new products --}}