<body>   
	
 <div class="container1-full-row2 center">
 			<h1 style="text-align: center;">POS PRINT</h1>
 </div>
     <div class="container1-full-row3">
        <table width="100%" border="0" cellpadding="6" cellspacing="1">
            <tr>
                <th width="5%" align="left">S.N.</th>
                <th width="40%" align="left">Product Name</th>
                <th width="8%" align="left">Qty</th>
                <th width="10%" align="left">Unit Price</th>
                <th width="10%" align="left">Tax Percent</th>
                <th width="15%" align="left">Amount without tax</th>
                <th width="15%" align="left">Amount</th>

            </tr>
                        	<?php

                        $serial=1;
                        for($i=0;$i<$counting;$i++) 
                        {
            	     echo '<tr><td>' . $serial . '</td><td>' . $tabledata['names'][$i] . '</td><td>' . $tabledata['qty'][$i] . '</td><td>' . $tabledata['unitprice'][$i] . '</td><td>' . $tabledata['taxrate'][$i] . '</td><td>' . $tabledata['amountwithouttax'][$i] . '</td><td>' . $tabledata['amount'][$i] . '</td></tr>';
            	     $serial++;
            	 }
  			 ?> 
  		
            
        </table>
    </div>

     <div class="container1-full-row5-right">
            <strong>Subtotal(Without Tax):	</strong> <?php echo $subtotaltaxwithouttax; ?> <br/>
            <strong>Subtotal(With Tax):	</strong> :<?php    echo number_format((float) round($subtotalwithtax), 2, '.', '');  ?> <br/>
            
              <strong>Discount type</strong> :<?php 
              if ($discounttype==1) {
               	echo "Percentage";
               } 
               elseif ($discounttype==2) {
                	echo "Amount";
                } ?> <br/>
                <strong>Discount Value</strong> :<?php  echo number_format((float) round($discountvalue), 2, '.', '');?> <br/>
           
            <strong>----------------------</strong><br>
            <strong>Final Amount</strong> : <?php echo number_format((float) round($totalPrice), 2, '.', ''); ?> 
        </div>
  
</body>
<style>
    html, body {
        font-family: Arial;
        line-height:21px;
        font-size: 11px;
        /*background: #F5F5F5;
        background: #F5F6F7;*/
    }

    /* Link Styles */
    a:link, a:visited {
        color:#33628c;
        text-decoration: none;
    }

    a:hover {
        color:#e1292f;
        text-decoration: none;
    }

    img { border:none; }

    h1,h2,h3,h4,h5,h6 { padding: 0px; margin: 0px; }

    .container {
        width: 750px;
        line-height: normal;
        font-variant: normal;
        text-transform: none;
        color: #333333;
        font-size: 12px;
        text-decoration: none;
        float: left;
    }
    .container1-full-row1 {
        width: 740px;
        padding: 5px 5px 5px 5px;
        float: left;
        font-size: 12px;
        border-bottom: 1px solid #000000;
    }
    .container1-full-row1-c1 {
        width: 420px;
        padding: 5px 5px 5px 5px;
        float: left;
        font-size: 12px;
    }
    .container1-full-row1-c1-logo {
        width: 520px;
        padding: 0px 0px 0px 0px;
        float: left;
    }
    .container1-full-row1-c1-1 {
        width: 520px;
        padding: 5px 0px 0px 0px;
        float: left;
        font-size: 20px;
        font-weight: bold;
    }
    .container1-full-row1-c1-2 {
        width: 520px;
        padding: 5px 0px 0px 0px;
        float: left;
        font-size: 12px;
    }
    .container1-full-row1-c1-3 {
        width: 520px;
        padding: 5px 0px 0px 0px;
        float: left;
        font-size: 12px;
        font-style: italic;
    }
    .container1-full-row1-c1-4 {
        width: 520px;
        padding: 5px 0px 0px 0px;
        float: left;
        font-size: 13px;
        font-weight: bold;
    }
    .container1-full-row1-c2 {
        width: 200px;
        padding: 5px 5px 5px 5px;
        float: right;
        font-size: 12px;
    }
    .container1-full-row1-c2-1 {
        width: 200px;
        padding: 5px 0px 0px 0px;
        float: left;
        font-size: 30px;
        font-weight: bold;
        text-align: right;
    }
    .container1-full-row2 {
        width: 750px;
        float: left;
        font-size: 12px;
        padding: 25px 0px 0px 0px;
        line-height: 18px;
    }
    .container1-full-row2-left {
        width: 304px;
        padding: 10px 10px 10px 10px;
        float: left;
        font-size: 13px;
        line-height: 18px;
    }
    .container1-full-row2-right {
        width: 325px;
        float: right;
        font-size: 12px;
    }
    .container1-full-row2-right-1 {
        width: 355px;
        padding: 5px 10px 5px 10px;
        float: left;
        font-size: 12px;
    }
    .container1-full-row3 {
        width: 720px;
        float: left;
        font-size: 12px;
        padding: 5px 15px 15px 15px;
    }
    .container1-full-row3 tr:nth-child(even) {background-color: #f2f2f2;}
    .container1-full-row3 th { border: 1px solid #d5d5d5; background-color: #d5d5d5; }
    .container1-full-row3 td { border: 1px solid #f2f2f2; }
    .container1-full-row3 .border-null { border:none; background: none; }
    /*.container1-full-row3 table { border: 1px solid #f2f2f2; }*/
    .container1-full-row4 {
        width: 720px;
        float: left;
        padding: 0px 15px 8px 15px;
        text-align: center;
    }
    .container1-full-row4-page {
        width: 80px;
        float: left;
        padding: 6px 5px 6px 5px;
        font-size: 12px;
        text-align: center;
        background: #d7d7ff;
        border: 2px solid #b1b1fc;
    }
    .container1-full-row4-continue {
        width: 80px;
        float: right;
        padding: 6px 5px 6px 5px;
        font-size: 12px;
        text-align: center;
        background: #d7d7ff;
        border: 2px solid #b1b1fc;
    }
    .container1-full-row5 {
        width: 720px;
        float: left;
        padding: 0px 15px 8px 15px;
        line-height: 22px;
        font-size: 12px;
        border-bottom: 1px dotted #cccccc;
    }
    .container1-full-row5-left {
        width: 310px;
        float: left;
        line-height: 22px;
        font-size: 12px;
    }
    .container1-full-row5-right {
        width: 310px;
        float: right;
        line-height: 22px;
        font-size: 12px;
        text-align: right;
    }
    .container1-full-row6 {
        width: 720px;
        float: left;
        padding: 10px 15px 5px 15px;
        line-height: 22px;
        font-size: 12px;
    }
    .container1-full-row06 {
        width: 720px;
        float: left;
        padding: 11px 15px 5px 15px;
        line-height: 22px;
        font-size: 12px;
        text-align: center;
    }
    .container1-full-row7 {
        width: 720px;
        float: left;
        padding: 5px 15px 5px 15px;
        font-size: 12px;
    }
    .container1-full-row9 {
        width: 734px;
        float: left;
        padding: 8px 8px 8px 8px;
        font-size: 11px;
        text-align: center;
        border-top: 1px dotted #4f4f4f;
    }
    /**************************************************************************************************/
    
    @font-face {
  font-family: 'Calibri';
  font-style: italic;
  font-weight: 400;
  src: local('Calibri Italic'), local('Calibri-Italic'), url(https://fonts.gstatic.com/l/font?kit=J7adnpV-BGlaFfdAhLQo6btP&skey=36a3d5758e0e2f58&v=v10) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin */
@font-face {
  font-family: 'Calibri';
  font-style: italic;
  font-weight: 700;
  src: local('Calibri Bold Italic'), local('Calibri-BoldItalic'), url(https://fonts.gstatic.com/l/font?kit=J7aYnpV-BGlaFfdAhLQgUp5aHRge&skey=8b00183e5f6700b6&v=v10) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin */
@font-face {
  font-family: 'Calibri';
  font-style: normal;
  font-weight: 400;
  src: local('Calibri'), url(https://fonts.gstatic.com/l/font?kit=J7afnpV-BGlaFfdAhLEY6w&skey=a1029226f80653a8&v=v10) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin */
@font-face {
  font-family: 'Calibri';
  font-style: normal;
  font-weight: 700;
  src: local('Calibri Bold'), local('Calibri-Bold'), url(https://fonts.gstatic.com/l/font?kit=J7aanpV-BGlaFfdAjAo9_pxqHw&skey=cd2dd6afe6bf0eb2&v=v10) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
    
    
    
    

   
</style>