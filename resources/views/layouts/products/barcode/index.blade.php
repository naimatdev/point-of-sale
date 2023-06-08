@extends('layouts.app')
@section('content')
   {{-- css for data Tables --}}
<div class="container">
<div class="col-lg-12 ">
<div class="row">
    <div class="card col-md-12">
        <div class="card-header bg-primary ">
            <h4 class="">Products Barcodes</h4>
        </div>
        <div class="card-body">
            <div id="print">
                <div class="row">
                    @forelse ($productsBarcode as $barcode )
                        <div class="col-md-3">
                            <div class="card pt-1 pb-1">
                                {{-- {{ dd($barcode->barcode) }} --}}
                                {{-- {!! $barcode->barcode !!} --}}
                                <img src="{{  asset('product/barcodes/'.$barcode->barcode )}}" alt="image not loaded">
                                <p class="text-center m-1">{{ $barcode->product_code }}</p>
                            </div>
                        </div>
                    @empty
                        <h2 align ="center">No data</h2>
                    @endforelse
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection