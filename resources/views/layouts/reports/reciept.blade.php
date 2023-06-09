


<div id="invoice-POS">
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>SBISTechs Inc</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
<div id="billCahsier">
<span>bill#</span>
<span>cashier#</span>
</div>
    <hr>
    <div id="mid">
      <div class="info">
        <h2>Contact Info</h2>
        <p> 
            Address : street city, state 0000</br>
            Email   : JohnDoe@gmail.com</br>
            Phone   : 555-555-5555</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">
					<div id="table">
						<table>
							<tr class="tabletitle">
								<td class="item"><h2>Item</h2></td>
								<td class="Hours"><h2>Qty</h2></td>
								<td class="Hours"><h2>U/Price</h2></td>
								<td class="Rate"><h2>Sub Total</h2></td>
							</tr>

							@foreach ($order_receipt as $receipt )
              {{-- {{ dd($order_receipt) }}  --}}
							<tr class="service">
								<td class="tableitem"><p class="itemtext">{{ $receipt->product->product_name}}</p></td>
								<td class="tableitem"><p class="itemtext">{{ $receipt->quantity}}</p></td>
								<td class="tableitem"><p class="itemtext">{{ $receipt->unitprice }}</p></td>
								<td class="tableitem"><p class="itemtext">{{ $receipt->amount}}</p></td>
							</tr>
							@endforeach

							<tr class="tabletitle">
								<td></td>
								<td></td>
								<td class="Rate"><h2>Totall</h2></td>
								<td class="payment"><h2>{{ $last_amount }}</h2></td>
							</tr>

							<tr class="tabletitle">
								<td></td>
								<td></td>
								<td class="Rate">Cash</td>
								<td class="payment">{{ $receipt->amount }}</td>
							</tr>
							<tr class="tabletitle">
								<td></td>
								<td></td>

								<td class="Rate">change</td>
								<td class="payment">$3,6w4</td>
                </tr>
						</table>
					</div><!--End Table-->

					<div id="legalcopy">
						<p class="legal"><strong>Thank you for your business!</strong>  Payment is expected 
						</p>
					</div>
					<div>
             <p>S.No :<b>003424</b> <span>:12/12/22 : 3:30 PM<span></p>
					</div>

				</div><!--End InvoiceBot-->
  </div><!--End Invoice-->


  <style>
    #invoice-POS{
  box-shadow: 0 0 .2in 0.01in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
  
  }
  #billCahsier
  {

    font-size: 10px;
    display: block;

  }
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
 
#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid green;

}

#top{min-height: 100px;}
#mid{min-height: 80px;} 
#bot{ min-height: 50px;}

#top .logo{
  //float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/logo1.png) no-repeat;
	background-size: 60px 60px;
}
.clientlogo{
  float: left;
	height: 60px;
	width: 60px;
	background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
	background-size: 60px 60px;
  border-radius: 50px;
}
.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;} 
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .5em;
  background: #EEE;

}

.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}

#legalcopy{
  margin-top: 5mm;
}


  </style>

