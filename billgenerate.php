<?php session_start();
if(empty($_SESSION["un"]))
{
    $msg="please login";
    echo "<script>alert('$msg');window.location.href='login.php'; </script>";
}
?>
<html>
    <head>
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

    </head>
    <body onload="window.print();">
        <?php 
        
       /* function numberTowords($num)
        {
        
        $ones = array(
        0 =>"ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
        );
        $tens = array( 
        0 => "ZERO",
        1 => "TEN",
        2 => "TWENTY",
        3 => "THIRTY", 
        4 => "FORTY", 
        5 => "FIFTY", 
        6 => "SIXTY", 
        7 => "SEVENTY", 
        8 => "EIGHTY", 
        9 => "NINETY" 
        ); 
        $hundreds = array( 
        "HUNDRED", 
        "THOUSAND", 
        "MILLION", 
        "BILLION", 
        "TRILLION", 
        "QUARDRILLION" 
        ); 
        $num = number_format($num,2,".",","); 
        $num_arr = explode(".",$num); 
        $wholenum = $num_arr[0]; 
        $decnum = $num_arr[1]; 
        $whole_arr = array_reverse(explode(",",$wholenum)); 
        krsort($whole_arr,1); 
        $rettxt = ""; 
        foreach($whole_arr as $key => $i){
            
        while(substr($i,0,1)=="0")
                $i=substr($i,1,5);
        if($i < 20){ 
        
        $rettxt .= $ones[$i]; 
        }elseif($i < 100){ 
        if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
        if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
        }else{ 
        if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
        if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
        if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
        $rettxt .= " ".$hundreds[$key]." "; 
        }
        } 
        if($decnum > 0){
        $rettxt .= " and ";
        if($decnum < 20){
        $rettxt .= $ones[$decnum];
        }elseif($decnum < 100){
        $rettxt .= $tens[substr($decnum,0,1)];
        $rettxt .= " ".$ones[substr($decnum,1,1)];
        }
        }
        return $rettxt;
        }*/

function numberTowords($num)
{
                
  $number=$num;          
  $number1 = $number;
  $no = floor($number);
  $hundred = null;
  $digits_1 = strlen($no); //to find lenght of the number
  $i = 0;
  // Numbers can stored in array format
  $str = array();
  
  $words = array('0' => '', '1' => 'One', '2' => 'Two',
  '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
  '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
  '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
  '13' => 'Thirteen', '14' => 'Fourteen',
  '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
  '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
  '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
  '60' => 'Sixty', '70' => 'Seventy',
  '80' => 'Eighty', '90' => 'Ninety');
  
  $digits = array('', 'Hundred', 'Thousand', 'lakh', 'Crore');
  //Extract last digit of number and print corresponding number in words till num becomes 0
  while ($i < $digits_1)
  {
  $divider = ($i == 2) ? 10 : 100;
  //Round numbers down to the nearest integer
  $number =floor($no % $divider);
  $no = floor($no / $divider);
  $i +=($divider == 10) ? 1 : 2;
  
  if ($number)
  {
  $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
  $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
  $str [] = ($number < 21) ? $words[$number] . " " .
  $digits[$counter] .
  $plural . " " .
  $hundred: $words[floor($number / 10) * 10]. " " .
  $words[$number % 10] . " ".
  $digits[$counter] . $plural . " " .
  $hundred;
  }
  else $str[] = null;
  }
  
  $str = array_reverse($str);
  $result = implode('', $str); //Join array elements with a string
 
  return $result ;
}


        
        include('dbcon.php');
        $ta=0;
        $tta=0;
    $bill=$_GET['b'];
   $q="select * from finalpurchase where billno='$bill'";
    $res7 = mysqli_query($con, $q);
    $row = mysqli_fetch_assoc($res7);
        ?>
       <center> <h1> TAX INVOICE</h1></center>
        <table style="width:100%">
            <tr>
                <td rowspan="2">ABC COMPANY</td>
                <td colspan="2">Invoice No. 
               
                </td>
                <td colspan="2">Dated</td>
            </tr>
            
            <tr>
                <td colspan="2"> <?php echo $row['billno']; ?></td>
                <td colspan="2"><?php echo $row['date']; ?></td>
            </tr>
            <tr>
                <td >Seller Name
                    <br>
                    <?php 
                     $q1="select * from purchasebill where billno='$bill'";
                     $res8 = mysqli_query($con, $q1);
                     $row8 = mysqli_fetch_assoc($res8);
                    echo $row8['companyname']; ?>
                </td>
                <td colspan="4"></td>
                
            </tr>
           
            <tr>
                <td>Description</td>
                <td>Category Name</td>
                <td>Quantity</td>
                <td>Rate/pcs</td>
                <td>Amount</td>
            </tr>
            <tr>
                <td>
                <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $c=1;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $c." ".$rowdes['subcategoryname']." ".$rowdes['productname']."<br>";
        $c++;
    }

?>
                </td>
                <td><?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $rowdes['categoryname']."<br>";
    }
    ?></td>
                <td>
                <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $rowdes['quantity']."<br>";
    }
    ?>

                </td>
                <td><?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $rowdes['price']."<br>";
    }
    ?></td>
                <td><?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $rowdes['quantity']*$rowdes['price']."<br>";
    }
    ?></td>
            </tr>
            <tr>
                <td>Total</td>
                
                <td colspan="2">Total No Of Quantity :
                    <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $q=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $q=$q+$rowdes['quantity'];
    }
    echo $q;
    ?></td>
                
                <td colspan="2">Total Amount :
                <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $ts=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $ts=$ts+ $rowdes['quantity']*$rowdes['price'];
        
    }
    $ta=$ts;
    echo $ts;
    ?>
                </td>
            </tr>
            <tr>
         <td colspan="5">Amount charge able in word 
            <?php 



echo numberTowords("$ts")
            
            
            ?>
         </td>
            </tr>  
            <tr>
                <td>Product Name</td>
                <td>Amount</td>
                <td>CGST</td>
                <td>SGST</td>
                <td> Tax Amount</td>
            </tr> 
            <tr>
                <td><?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $c=1;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $c." ".$rowdes['productname']."<br>";
        $c++;
    }
?></td>
                <td> <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        echo $rowdes['quantity']*$rowdes['price']."<br>";
    }
    ?></td>
                <td> <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $ts=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $ts=$ts+ $rowdes['quantity']*$rowdes['price'];
        $pname=$rowdes['productname'];
        $cname=$rowdes['categoryname'];
        $sname=$rowdes['subcategoryname'];

        $gst="select * from product where categoryname='$cname' and subcategoryname='$sname' and productname='$pname'";
        $resgst=mysqli_query($con,$gst);
        $rowgst=mysqli_fetch_assoc($resgst);

        $cgst=$rowgst['cgst']*$rowdes['quantity']*$rowdes['price']/100;
       echo $cgst."(".$rowgst['sgst']."%)<br>";
    }
    
    ?></td>
                 
                <td> <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $ts=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $ts=$ts+ $rowdes['quantity']*$rowdes['price'];
        $pname=$rowdes['productname'];
        $cname=$rowdes['categoryname'];
        $sname=$rowdes['subcategoryname'];

        $gst="select * from product where categoryname='$cname' and subcategoryname='$sname' and productname='$pname'";
        $resgst=mysqli_query($con,$gst);
        $rowgst=mysqli_fetch_assoc($resgst);

        $sgst=$rowgst['sgst']*$rowdes['quantity']*$rowdes['price']/100;
       echo $sgst."(".$rowgst['sgst']."%)<br>";
    }
    
    ?></td>
               <td> <?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $tgst=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $ts=$ts+ $rowdes['quantity']*$rowdes['price'];
        $pname=$rowdes['productname'];
        $cname=$rowdes['categoryname'];
        $sname=$rowdes['subcategoryname'];

        $gst="select * from product where categoryname='$cname' and subcategoryname='$sname' and productname='$pname'";
        $resgst=mysqli_query($con,$gst);
        $rowgst=mysqli_fetch_assoc($resgst);

        $cgst=$rowgst['cgst']*$rowdes['quantity']*$rowdes['price']/100;
        $sgst=$rowgst['sgst']*$rowdes['quantity']*$rowdes['price']/100;
       $tgst=$cgst+$sgst;
        echo $tgst."<br>";
        $tta=$tta+$tgst;
    }
    
    ?></td>
            </tr> 
            <tr>
                <td>Total</td>
                <td><?php $qdes="select * from finalpurchase where billno='$bill'";
    $resdes = mysqli_query($con, $qdes);
    $ts=0;
    while($rowdes = mysqli_fetch_assoc($resdes))
    {
        $ts=$ts+ $rowdes['quantity']*$rowdes['price'];
    }
    echo $ts;
    ?></td>
                
                </td><td colspan="2"></td>
                <td><?php echo $tta;?></td>
            </tr> 
            <tr>
                <td colspan="5" style="padding-right:150px"> <p align="right">total Tax amount: <?php echo round($ta+$tta);?>(Round Off)</p></td>
            </tr>    
            <tr>
                <td colspan="5"> Tax amount in word <?php 
                $t=$tta+$ta;
                echo numberTowords("$t")?></td>
            </tr>      
        </table>
    </body>
</html>