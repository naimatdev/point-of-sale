@extends('layouts.app')
@section('content')
<div class="container-fluid">
@livewire('order')
                {{-- modal of receipt --}}
                <div class="modal">
                    <div id="print">
                        @include('layouts.reports.reciept')
                    </div>
                </div>
<style>
    .card-header
    {
        width: 100%;
    }
   div #parent-div-btn
    {
        display: flex;
        width: 10px;
        color:green;

    }
</style>
@endsection

@section('js')
<script>
  $(".add_more").on("click", function() {
    var product_id = $(".product_id").html();
    var addRow = ($(".addMoreProduct tr").length - 0) + 1;
    var tr = '<tr>  <td colspan="1" class="no">' + addRow + '</td>' +
        ' <td><select name="product_id[]" id="product_id" class="form-control product_id">' + product_id +
        ' </select></td>' +
        '<td colspan="1"><input class="col-md-12  form-control quantity" type="number" name="quantity[]" id="quantity" value="1"required></td>' +
        '<td colspan="1"><input class="col-md-12  form-control price" type="number" name="price[]" id="price"></td>' +
        ' <td colspan="1"><input class="col-md-12 form-control discount" type="number" name="discount[]" id="discount" value="0"></td>' +
        ' <td colspan="1"><input class="col-md-12  form-control totall" type="number" name="totall[]" id="totall[]"></td>' +
        '<td> <a href="#" style="float: right;" class="btn btn-danger delete"  ><i class="fa fa-times text-white rounded-circle"></i></a> </td>';
    
    $(".addMoreProduct").append(tr);
});
$(".addMoreProduct").delegate(".delete","click",function(){
    $(this).parent().parent().remove();
})
function totallAmount ()
    {
        var totall =0;
        $(".totall").each(function(i,e){
            var amount =$(this).val() - 0;
            totall +=amount;
        });
        $(".totall_amount_show").html(totall);
    }

$(".addMoreProduct").on("change",".product_id,.quantity,.discount,.totall_amount_show", function(){
    var tr = $(this).parent().parent();
    var price =tr.find(".product_id option:selected").attr('data-price');
    tr.find(".price").val(price);
    // var qty = tr.find(".quantity").val()+1;
    var qty = parseFloat(tr.find(".quantity").val());

        qty = isNaN(qty) ? 1 : qty;

    var disc = tr.find(".discount").val()-0;
    var price = tr.find(".price").val()-0;
    var totall_amount = (qty * price)-((qty * price * disc)/100);
    tr.find(".totall").val(totall_amount);
       totallAmount();
    // $(".totall_amount_show").html(total_amount);
});

$(".paid_amount").keyup(function(){
    var total =$(".totall_amount_show").html();
    var paid_amount =$(this).val();
    var balance =  paid_amount-total ;
    $(".balance").val(balance).toFixed(2);
   
});

function printRecieptContent(el)
{
    var data = `
  <input type="button" class="printPageButton" style="display: block; width: 100%; 
  border: none; background-color: #008B8B; color: #ffffff; padding: 14px 28px; font-size:
   16px; cursor: pointer; text-align: center;" value="Print Receipt" onclick="window.print()">
`;
data +=document.getElementById(el).innerHTML;
myReceipt = window.open("","myWin","left=150,top=130,width=400, height=700");
myReceipt.screenX = 0;
myReceipt.screenY = 0;
myReceipt.document.write(data);
myReceipt.document.title="print reciept";
myReceipt.focus();
setTimeout(() => {
    myReceipt.close();
}, 8000);
}



</script>
@endsection