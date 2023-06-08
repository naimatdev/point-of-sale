@extends('layouts.app')
@section('content')
   {{-- css for data Tables --}}

@livewire('products')
<style>
    .modal.right .modal-dialog{
    right: 0;
    top: 0;
    margin-right:3vh; 
    }
.fa-trash:hover{
background-color: black;
text-emphasis-color: white;
    }
</style>
{{-- sweet alert not working  --}}
<script>
 $(document).ready(function() {
  
   $("#dataTable").DataTable();
 });

</script>
@endsection