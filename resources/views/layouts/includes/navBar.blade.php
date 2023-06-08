<a href="#" data-toggle="modal" data-target="#staticBackdrop" class="btn btn-outline rounded-pill"><i class="fa fa-list"></i></a>
<a href="{{ route('users.index') }}" class="btn btn-outline rounded-pill" @if(Session::get('page')=="users")  style ="background-color:#4B49AC !important; color: #fff !important; "
 @else style ="border-color:#008B8B !important; color: #008B8B !important; " @endif class="nav-link"><i class="fa fa-users"></i>users</a>
<a href="{{ route('products.index') }}" class="btn btn-outline rounded-pill" @if(Session::get('page')=="products")  style ="background-color:#4B49AC !important; color: #fff !important; "
@else style ="border-color:#008B8B !important; color: #008B8B !important; " @endif><i class="fa fa-box"></i>Products</a>
<a href="{{ route('orders.index') }}" class="btn btn-outline rounded-pill" @if(Session::get('page')=="cashier")  style ="background-color:#4B49AC !important; color: #fff !important; "
@else style ="border-color:#008B8B !important; color: #008B8B !important; " @endif><i class="fa fa-cash-register"></i>Cashier</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-file"></i>Report</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-money-bill"></i>Transcations</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-users"></i>Customers</a>
<a href="#" class="btn btn-outline rounded-pill"><i class="fa fa-truck"></i>Incoming</a>
<a href="{{ route('products.barcode') }}" class="btn btn-outline rounded-pill" @if(Session::get('page')=="barcode")  style ="background-color:#4B49AC !important; color: #fff !important; "
@else style ="border-color:#1eacac !important; color: #329a9a !important; " @endif><i class="fa fa-barcode"></i>Barcode</a>


<style>
    .btn-outline
    {
border-color: #008B8B;
color:#008B8B;
    }
    .btn-outline.btn:hover
    {
background-color: #008B8B;
color:#fff !important;
    }
</style>