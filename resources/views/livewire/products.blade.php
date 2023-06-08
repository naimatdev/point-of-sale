<div>
    {{-- Do your work, then step back. --}}
    <div class="container-fluid col-md-12 ">
    <div class="col-lg-12">
    <div class="row">
        <div class="card col-md-9">
            <div class="card-header">
                <h4>Add Product</h4>
                <a href="#" style="float: right;" class="btn btn-dark"  data-toggle="modal" data-target="#addproduct">
                <i class="fa fa-plus"></i>Add New Product</a>
            </div>
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif
              @if (session('Delete'))
              <div class="alert alert-danger" role="alert">
                  {{ session('Delete') }}
                  
                </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                    
                  </div>
                  @endif
            <div class="card-body">
                
            @include('layouts.products.table')
                    
            </div>
        </div>
    
     <div class="col-md-3">
        <div class="card ">
            <div class="card-header">
                <h3>search Products</h3>
            </div>
            <div class="card-body">
                @include('layouts.products.product_detail')
            </div>
        </div>
    </div> 
</div>
</div>
