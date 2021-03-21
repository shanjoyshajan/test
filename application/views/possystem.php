<form action="index.php/Pos/print_pdf" method="post" target="_blank">
<div class="container">
	<h3 class="center">POS SYSTEM</h3>
<table class="table table-bordered table-hover" name="postable" id="postable" style="width: 100%;">
 <thead class="thead-dark">
 	<tr>
		<!-- <th style="display: none;">No.</th> -->
		<th>Name</th>
		<th>Quantity</th>

		<th>Unit Price</th>
		<th>Tax(In %)</th>
		<th>Total</th>
		<th>Options</th>
</tr>
	</thead>
	<tbody>
<tr>

	<input type="hidden" name="index[]" placeholder="" value="1">

<td>
	<input type="text" name="name[]" id="name" placeholder="" required="required">
</td>
<td>
	<input type="text" name="quantity[]" id="quantity" placeholder="Quantity" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
</td>
<td>
	<input type="text" name="unitprice[]" id="unitprice" placeholder="Unit Price" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>

</td>
<td>
		 <select  class="form-control select2 prod" name="taxrate[]"  id="taxrate" style="width: 250px;">
		 		<option value="0">0%</option>
		 		<option value="1">1%</option>
		 		<option value="5">5%</option>
		 		<option value="10">10%</option>

		 </select> 
</td>
<td>
	<input type="text" class="amountwithouttax" name="amountwithouttax[]" id="amountwithouttax">
	<input type="hidden"  class="amount"  name="amount[]" id="amount" >
</td>
<td>
	<button  class="addmore" name="addmore">+</button>
	<button id="remover"  name="delete">-</button>
</td>
</tr>
</tbody>
</table>
<div class="container">
	<div class="row">
		<div class="col-md-6">
			
		</div>
		<div class="col-md-6 col-xs-12">
			<table class="finalval" id="finalval">
				<tr>
					<td><label class="pull-right" style="font-weight: bolder;font-size: 20px;">Subtotal(Without Tax):</label> </td>
					<td><input id="subtotaltaxwithouttax" style="display: inline-block;font-weight: bolder;font-size: 20px;border:none;width: 100px;" type="text"  name="subtotaltaxwithouttax" ></td>
				</tr>
				<tr>
					<td><label class="pull-right" style="font-weight: bolder;font-size: 20px;">Subtotal(With Tax): </label> </td>
					<td> <input id="subtotalwithtax" style="display: inline-block;font-weight: bolder;font-size: 20px;border:none;width: 100px;" type="text"  name="subtotalwithtax" value="" ></td>
				</tr>
          <tr>
          <td><label class="pull-right" style="font-weight: bolder;font-size: 20px;">Discount choose type:</label> </td>
          <td>
            <select class="form-control select2 prod" name="discounttype"  id="discounttype" style="width: 100px;">
                <option value="1">%</option>
                <option value="2">amount</option>
           </select>
         </td>
        </tr>

        <tr>
          <td><label class="pull-right" style="font-weight: bolder;font-size: 20px;">Discount Value:</label> </td>
          <td><input id="discountvalue" style="display: inline-block;font-weight: bolder;font-size: 20px;width: 100px;" type="text"  name="discountvalue" onkeypress='return event.charCode >= 48 && event.charCode <= 57' ></td>
        </tr>
				<tr>
					<td><label class="pull-right" style="font-weight: bolder;font-size: 20px;">Total:</label> </td>
					<td><input id="totalPrice" style="display: inline-block;font-weight: bolder;font-size: 20px;border:none;width: 100px;" type="text" id="totalPrice" name="totalPrice" value="" ></td>
				</tr>

			</table>
		</div>

	<div class="col-md-12 col-xs-12 text-center">
  		<button class="button btn-primary" type="submit">PRINT</button>
  </div>

   </div>

  </div>

 </div>
</form>
<script type="text/javascript">
	 $(document).ready(function(){

	 var indexval=1;
   $(".addmore").click(function () {
    ++indexval;
    $("#postable").each(function () {
        var tds = '<tr>';
        // jQuery.each($('tr:last td', this), function () {
        //     tds += '<td style="border: 1px solid #d2d6de;">' + $(this).html() + '</td>';
        // });
        tds += '</tr>';
        if ($('tbody', this).length > 0) {
            $('tbody', this).append('<tr valign="top" class="main"><input type="hidden" name="index[]" id="index" placeholder="" value="'+indexval+'"><td><input type="text" id="name" name="name[]" placeholder="" required></td><td><input type="text" name="quantity[]" id="quantity" placeholder="Quantity" required></td><td><input type="text" id="unitprice" name="unitprice[]" placeholder="Unit Price" required ></td><td><select  class="form-control select2 prod" id="taxrate" name="taxrate[]"  id="taxrate" style="width: 250px;"><option value="0">0</option><option value="1">1</option><option value="5">5</option><option value="10">10</option></select> </td><td><input type="text" name="amountwithouttax[]" class="amountwithouttax" id="amountwithouttax" placeholder=""><input type="hidden" class="amount"  name="amount[]" id="amount"></td><td><button id="remover"  name="delete">-</button></td></tr>');
        } else {
            $(this).append(tds);
        }
    });
        
});
  $("#postable").on('click','#remover',function() {
  
      var amountwithouttax = $(this).closest("tr").find('#amountwithouttax').val();
      var amount = $(this).closest("tr").find('#amount').val();
      var sum = 0;
      var totalamtwitouttax = 0;
      var amtafterdiscount=0;
      var discountamt=0;

      // var subtotaltaxwithouttax = $('#subtotaltaxwithouttax').val();
      // var subtotalwithtax = $('#subtotalwithtax').val();
      // subtotaltaxwithouttax=subtotaltaxwithouttax-amountwithouttax;
      // amount=amount-subtotalwithtax;


 

      // var total = $('#totalPrice').val();
      // var bal = parseInt(total) - parseInt(amount);
      $(this).parent().parent().remove();
      // $('#totalPrice').val(bal);
      --indexval;
      $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);

  });

 

$('#postable').on('input', '#quantity', function() {
		var qty = $(this).closest("tr").find('#quantity').val();
  var price   = $(this).closest("tr").find('#unitprice').val();
  var taxrate   = $(this).closest("tr").find('#taxrate').val();
  var qp= qty*price;
  taxrates=parseFloat(price*(taxrate/100));
  tprice=parseFloat(price)+parseFloat(taxrates);
  var amount = qty* tprice;
  amount=amount.toFixed(2);
  $(this).closest("tr").find('#amount').val(amount);
  $(this).closest("tr").find('#amountwithouttax').val(qp);

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
	
 
});

$('#postable').on('input', '#unitprice', function() 
{

  var qty = $(this).closest("tr").find('#quantity').val();
  var price   = $(this).closest("tr").find('#unitprice').val();
  var taxrate   = $(this).closest("tr").find('#taxrate').val();
  var qp= qty*price;
  taxrates=parseFloat(price*(taxrate/100));
  tprice=parseFloat(price)+parseFloat(taxrates);
  var amount = qty* tprice;
  amount=amount.toFixed(2);
  $(this).closest("tr").find('#amount').val(amount);
  $(this).closest("tr").find('#amountwithouttax').val(qp);

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
	

});

$('#postable').on('input', '#discounttype', function() 
{

  var qty = $(this).closest("tr").find('#quantity').val();
  var price   = $(this).closest("tr").find('#unitprice').val();
  var taxrate   = $(this).closest("tr").find('#taxrate').val();
  var qp= qty*price;
  taxrates=parseFloat(price*(taxrate/100));
  tprice=parseFloat(price)+parseFloat(taxrates);
  var amount = qty* tprice;
  amount=amount.toFixed(2);
  $(this).closest("tr").find('#amount').val(amount);
  $(this).closest("tr").find('#amountwithouttax').val(qp);

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
  

});

$('#finalval').on('input', '#discountvalue', function() 
{

  var qty = $(this).closest("tr").find('#quantity').val();
  var price   = $(this).closest("tr").find('#unitprice').val();
  var taxrate   = $(this).closest("tr").find('#taxrate').val();
  var qp= qty*price;
  taxrates=parseFloat(price*(taxrate/100));
  tprice=parseFloat(price)+parseFloat(taxrates);
  var amount = qty* tprice;
  amount=amount.toFixed(2);
  $(this).closest("tr").find('#amount').val(amount);
  $(this).closest("tr").find('#amountwithouttax').val(qp);

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
  

});

$('#postable').on('input', '#taxrate', function() {

  var qty = $(this).closest("tr").find('#quantity').val();
  var price   = $(this).closest("tr").find('#unitprice').val();
  var taxrate   = $(this).closest("tr").find('#taxrate').val();
  var qp= qty*price;
  
  taxrates=parseFloat(price*(taxrate/100));
  tprice=parseFloat(price)+parseFloat(taxrates);
  var amount = qty* tprice;
  amount=amount.toFixed(2);
  $(this).closest("tr").find('#amount').val(amount);
  $(this).closest("tr").find('#amountwithouttax').val(qp);

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
	
});

$('#finalval').on('input', '#discounttype', function() {

 

  var sum = 0;
  var totalamtwitouttax = 0;
  var amtafterdiscount=0;
  var discountamt=0;

  $( ".amount" ).each( function( i, el ) {
  
    var total = Number($( el ).val());
    console.log(total);
    sum += total;
    
});
   $( ".amountwithouttax" ).each( function( j, el ) {
    var ttlamtwithoutax = Number($( el ).val());
    console.log(ttlamtwithoutax);
    totalamtwitouttax += ttlamtwithoutax;
    
});
    sum=sum.toFixed(3);
    var discountval = $('#discountvalue').val();
    var discounttype = $('#discounttype').val();
    amtafterdiscount=sum;
    if(discounttype==1 && sum!=0)
    {
        discountamt=parseFloat(sum*(discountval/100));
        amtafterdiscount = sum-discountamt;
    }
    else
    {
        discountamt=discountval;
        amtafterdiscount = sum-discountamt;
    }
    $('#subtotalwithtax').val(sum);
    $('#totalPrice').val(amtafterdiscount);

    
     totalamtwitouttax=totalamtwitouttax.toFixed(3);
    $('#subtotaltaxwithouttax').val(totalamtwitouttax);
  
});





});



</script>