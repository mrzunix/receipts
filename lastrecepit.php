
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=600,width=700');
        mywindow.document.write('<html><head><link href="http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css" rel="stylesheet" type="text/css" /><title></title>');
mywindow.document.write('<body style="font-family: Droid Arabic Naskh;"');

        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


<?php

 require('include/nav.php');
?>

 <div class="panel panel-default">
                    <div class="panel-heading">
		<table width="140%">
       <tr>
<th>Recepit  Details</th>
<th>
 <button onclick="PrintElem('#invoice')" type="submit" class="btn btn-default">

                                                    <i class="fa fa-btn fa-print"></i>Print
                                                </button>

</th>

	</tr>
		</table>
                    </div>

                    <div class="panel-body" id="invoice" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                  


<?php

require('include/dbi.php');
$result = mysqli_query($con,"select * from recepits order by id desc limit 1  ");
while($row = mysqli_fetch_array($result))
  {

if(  $row['type']   == 1)
{
?>
<h3 align="center" style="margin-top:10%">ايصال استلام نقدية  </h3>
<table align="center" text-align="right" width="100%" >
<tr align="center" style="font-size:16px;" ><td colspan="1" width="50%">رقم الايصال</td><td td colspan="1">التاريخ</td></tr>
<tr align="center" style="font-size:16px;" ><td  colspan="1"width="50%"><?php echo $row['id'] ?> </td><td td colspan="1"><?php echo $row['date'] ?></td></tr>
<tr></tr>
<tr align="right" style="font-size:16px;" ><td colspan="2"> استلمنا نحن شركة فينكس ايجيبت من السادة / <?php echo $row['customer'] ?> </td></tr>
<tr  style="font-size:16px;" ><td align="center" colspan="1" width="50%">
<table>
<td style="font-size:16px;">ج . م</td><td>&nbsp;</td>
<td style="font-size:16px;"><?php echo $row['amount'] ?></td>  
</table>
</td><td align="right" colspan="1"> مبلغ و قدره   <?php echo $row['amountletters'] ?>  نقدأ</td></tr>
<tr align="right" style="font-size:16px;" ><td colspan="2"> وذلك مقابل  <?php echo $row['note'] ?> </td></tr>
<tr align="left" style="font-size:16px;"  ><td td colspan="2">توقيع المستلم </td></tr>
<tr align="left" style="font-size:16px;"  ><td td colspan="2"> ............. </td></tr>


</table>


<hr style="margin-top:10%;margin-bottom:20%">

<h3 align="center" >ايصال استلام نقدية  </h3>
<table align="center" text-align="right" width="100%" >
<tr align="center" style="font-size:16px;" ><td colspan="1" width="50%">رقم الايصال</td><td td colspan="1">التاريخ</td></tr>
<tr align="center" style="font-size:16px;" ><td  colspan="1"width="50%"><?php echo $row['id'] ?> </td><td td colspan="1"><?php echo $row['date'] ?></td></tr>
<tr></tr>
<tr align="right" style="font-size:16px;" ><td colspan="2"> استلمنا نحن شركة فينكس ايجيبت من السادة / <?php echo $row['customer'] ?> </td></tr>
<tr  style="font-size:16px;" ><td align="center" colspan="1" width="50%">
<table>
<td style="font-size:16px;">ج . م</td><td>&nbsp;</td>
<td style="font-size:16px;"><?php echo $row['amount'] ?></td>  
</table>
</td><td align="right" colspan="1"> مبلغ و قدره   <?php echo $row['amountletters'] ?>  نقدأ</td></tr>
<tr align="right" style="font-size:16px;" ><td colspan="2"> وذلك مقابل  <?php echo $row['note'] ?> </td></tr>
<tr align="left" style="font-size:16px;"  ><td td colspan="2">توقيع المستلم </td></tr>
<tr align="left" style="font-size:16px;"  ><td td colspan="2"> ............. </td></tr>




<?php
}
else 
{
?>

<h3 align="center"style="margin-top:15%" >ايصال استلام شيك  </h3>
<table align="center" text-align="right" width="100%"  >
<tr align="center" style="font-size:16px;"><td width="50%" td colspan="2">رقم الايصال</td><td td colspan="2">التاريخ</td></tr>
<tr align="center" style="font-size:16px;"><td td colspan="2"><?php echo $row['id'] ?></td><td td colspan="2"><?php echo $row['date'] ?> </td></tr>
<tr></tr>
<tr align="right" style="font-size:16px;" ><td colspan="4"> استلمنا نحن شركة فينكس ايجيبت من السادة / <?php echo $row['customer'] ?> </td></tr>
<tr align="right" style="font-size:16px;"><td colspan="4"> شيك بمبلغ و قدره   <?php echo $row['amountletters'] ?>   </td></tr>
<td align="center" colspan="2" width="30%">
<table>
<td style="font-size:16px;" style="font-size:16px;">ج . م</td><td>&nbsp;</td>
<td style="font-size:16px;" style="font-size:16px;"><?php echo $row['amount'] ?></td>  
</table>
</td><td align="right" colspan="2">  مسحوب  على  <?php echo $row['bank'] ?>  </td>
<tr align="right" style="font-size:16px;"><td colspan="4"> وذلك مقابل  <?php echo $row['note'] ?></td></tr>
<tr align="left" style="font-size:16px;"><td td colspan="2">توقيع المستلم </td></tr>
<tr align="left"  style="font-size:16px;"><td td colspan="2"> ............. </td></tr>


</table>

<hr style="margin-top:10%;margin-bottom:22%">

<h3 align="center" >ايصال استلام شيك  </h3>
<table align="center" text-align="right" width="100%"  >
<tr align="center" style="font-size:16px;"><td width="50%" td colspan="2">رقم الايصال</td><td td colspan="2">التاريخ</td></tr>
<tr align="center" style="font-size:16px;"><td td colspan="2"><?php echo $row['id'] ?></td><td td colspan="2"><?php echo $row['date'] ?> </td></tr>
<tr></tr>
<tr align="right" style="font-size:16px;" ><td colspan="4"> استلمنا نحن شركة فينكس ايجيبت من السادة / <?php echo $row['customer'] ?> </td></tr>
<tr align="right" style="font-size:16px;"><td colspan="4"> شيك بمبلغ و قدره   <?php echo $row['amountletters'] ?>   </td></tr>
<td align="center" colspan="2" width="30%">
<table>
<td style="font-size:16px;" style="font-size:16px;">ج . م</td><td>&nbsp;</td>
<td style="font-size:16px;" style="font-size:16px;"><?php echo $row['amount'] ?></td>  
</table>
</td><td align="right" colspan="2">  مسحوب  على  <?php echo $row['bank'] ?>  </td>
<tr align="right" style="font-size:16px;"><td colspan="4"> وذلك مقابل  <?php echo $row['note'] ?></td></tr>
<tr align="left" style="font-size:16px;"><td td colspan="2">توقيع المستلم </td></tr>
<tr align="left"  style="font-size:16px;"><td td colspan="2"> ............. </td></tr>

<?php
}

}


 require('include/footer.php');
?>
