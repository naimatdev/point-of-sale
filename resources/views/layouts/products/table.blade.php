<table class="table table-bordered table-left" id="dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Description</th>
            <th>brand</th>
            <th>price</th>
            <th>quantity</th>
            <th>stocks</th>
       
            <th >Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($products as $key => $product)
            <td>{{ $key+1 }}</td>
            <td wire:click="product_detail('{{ $product->id }}')" data-target="tooltip" data-placement="right" title="click to view" style="cursor: pointer;">{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->brand }}</td>
            <td>{{number_format( $product->price,2) }}</td>
            <td>{{ $product->quantity }}</td>
            <td>@if ($product->alert_stock <= $product->quantity)
                <span class="badge badge-success">low stock {{ $product->alert_stock }}</span>
                @else
                <span class="badge badge-danger">low stock {{ $product->alert_stock }}</span>
                @endif
            </td>

            <td colspan="2"> <a href="{{ $product->id }}" class="" data-toggle="modal" data-target="#editproduct{{ $product->id }}"> <i class="fa fa-edit fa-lg text-success"></i></a>&nbsp;|&nbsp;
                 <a href="{{ route('products.destroy',$product->id) }}" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}" id="confirm-delete"> <i class="fa fa-trash fa-lg text-danger"></i></a>
            </td>
        </tr>
  
      {{-- delete modal --}}
      @include('layouts.products.delete')
      <!-- Button trigger modal -->
      <!-- Modal -->
{{-- @livewire('products') --}}

      <!-- Add New product model -->
    @include('layouts.products.addProduct')
      <!-- Button trigger modal -->
      <!-- Modal -->
      <!-- Edit product model -->
   @include('layouts.products.edit')
   @endforeach
</tbody>

</table>