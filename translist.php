<?php

require('include/nav.php');
include_once './include/db.php';
if(isset($_POST['btn-delete']))
{



	$id = mysql_real_escape_string($_POST['id']);


if(mysql_query("delete from transactions where id = '$id' "))
	{

  echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> Transaction Has Been Deleted Successfully  </center>";
	echo "<meta http-equiv='refresh' content='0; URL=./translist.php' />";
	}
	else
	{
	echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Delete The Transaction </center>";
	}
}
?>





<center>
<table border="0" width="90%">

<!----- Get data ----------->
<?php require('include/db.php');
$result = mysql_query("SELECT sum(amount) as totaldeposit FROM transactions where type = 'Deposit'", $db);
while($row = mysql_fetch_array($result))
  {
$totaldeposit = mysql_real_escape_string($row['totaldeposit']);
}

$result = mysql_query("SELECT sum(amount) as totalcashdeposit FROM transactions where type = 'Deposit' AND method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
$totalcashdeposit = mysql_real_escape_string($row['totalcashdeposit']);
}

$result = mysql_query("SELECT sum(amount) as totalbankdeposit FROM transactions where type = 'Deposit' AND method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
$totalbankdeposit = mysql_real_escape_string($row['totalbankdeposit']);
}


$result = mysql_query("SELECT sum(amount) as totalwithdraw FROM transactions where type = 'Withdraw'", $db);
while($row = mysql_fetch_array($result))
  {
$totalwithdraw = mysql_real_escape_string($row['totalwithdraw']);
}


$result = mysql_query("SELECT sum(amount) as totalcashwithdraw FROM transactions where type = 'Withdraw' AND method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
$totalcashwithdraw = mysql_real_escape_string($row['totalcashwithdraw']);
}

$result = mysql_query("SELECT sum(amount) as totalbankwithdraw FROM transactions where type = 'Withdraw' AND method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
$totalbankwithdraw = mysql_real_escape_string($row['totalbankwithdraw']) ;
}


$result = mysql_query("SELECT sum(amount) as totalpayment FROM transactions where type = 'Payment'", $db);
while($row = mysql_fetch_array($result))
  {
$totalpayment = mysql_real_escape_string($row['totalpayment']);
}


$result = mysql_query("SELECT sum(amount) as totalcashpayment FROM transactions where type = 'Payment' AND method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
$totalcashpayment = mysql_real_escape_string($row['totalcashpayment']);
}

$result = mysql_query("SELECT sum(amount) as totalbankpayment FROM transactions where type = 'Payment' AND method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
$totalbankpayment = mysql_real_escape_string($row['totalbankpayment']) ;
}

$totalout =$totalwithdraw + $totalpayment ;
$totalbankout = $totalbankwithdraw + $totalbankpayment;
$totalcashout = $totalcashpayment + $totalcashpayment;

$totalbalance = $totaldeposit - $totalout;
$bankbalance = $totalbankdeposit - $totalbankout ;
$cashbalance = $totalcashdeposit - $totalcashout;

?>
<!------------------>


<tr>
<td>
<div class="btn btn-default ">
<p>Total Deposits Transactions</p>
<p style="font-weight:bold;font-size:18px">
<?php echo   " $totaldeposit &nbsp; L.E" ; ?>
</p>
<hr>
<table align="center"  width="200px">
<tr>
<td>
<p>Bank Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalbankdeposit &nbsp; L.E" ; ?>
</td>

<td>
<p>Cash Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalcashdeposit &nbsp; L.E" ; ?>
</td>
</tr>
</table>

</div>
</td>

<!----------Cureent Balance ---->
<td>
<div class="btn btn-primary ">
<p>Current Balance </p>
<p style="font-weight:bold;font-size:18px">
<?php echo   " $totalbalance &nbsp; L.E" ; ?>
</p>
<hr>
<table align="center"  width="200px">
<tr>
<td>
<p>Bank Balance</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $bankbalance &nbsp; L.E" ; ?>
</td>
<td>
<p>Cash Balance</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $cashbalance &nbsp; L.E" ; ?>
</td>
</tr>
</table>

</div>
</td>
<!---------- End ---------->







<td>
<div class="btn btn-default ">
<p>Total Withdraw Transactions</p>
<p style="font-weight:bold;font-size:18px">
<?php echo   " $totalwithdraw &nbsp; L.E" ; ?>
</p>
<hr>
<table align="center"  width="200px">
<tr>
<td>
<p>Bank Withdraw</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalbankwithdraw &nbsp; L.E" ; ?>
</td>
<td>
<p>Cash Withdraw</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalcashwithdraw &nbsp; L.E" ; ?>
</td>
</tr>
</table>

</div>
</td>

<td>
<div class="btn btn-default ">
<p>Total Payments Transactions</p>
<p style="font-weight:bold;font-size:18px">
<?php echo   " $totalpayment &nbsp; L.E" ; ?>
</p>
<hr>
<table align="center"  width="200px">
<tr>
<td>
<p>Bank Payment</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalbankpayment &nbsp; L.E" ; ?>
</td>
<td>
<p>Cash Payment</p>
<p style="font-weight:bold;font-size:16px">
<?php echo   " $totalcashpayment &nbsp; L.E" ; ?>
</td>
</tr>
</table>

</div>
</td>

</tr>
</table>



<br>
                <div class="panel panel-default">
                    <div class="panel-heading">

                 

<table width="100%"  >
<form method="GET" action="transreasult.php" class="form-horizontal">
<tr>

<td><label for="task-name">From : </label></td>
<td> <input  type="text" name="from"  id="datepicker"  class="form-control" required></input></td>
<td><label for="task-name" style="margin-left:10px" > To :</label></td>
<td> <input  type="text" name="to"   id="datepicker1"  class="form-control" required></td>

<td><label style="margin-left:10px"  for="task-name" > Type</label></td>
<td><select name="type" id="task-name" class="form-control" >
<OPTION  VALUE="">All</OPTION>
<OPTION  VALUE="Deposit">Deposit</OPTION>
<OPTION  VALUE="Withdraw">Withdraw</OPTION>
<OPTION  VALUE="Payment">Payment</OPTION>
</select>
 </td>

<td><label style="margin-left:10px"  for="task-name" > Method</label></td>
<td> <td><select name="method" id="task-name" class="form-control" >
<OPTION  VALUE="">ALL</OPTION>
<OPTION  VALUE="Bank">Bank</OPTION>
<OPTION  VALUE="Cash">Cash</OPTION>
</select></td>


<td ><button style="margin-left:20px" type="submit"  class="btn btn-success">
                                    <i class="fa fa-btn fa-search"></i>Search</td>

</tr>
</form>
</table>
</center>
   </div>
<div class="container">

            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Transactions History
                    </div>
 

<?php
include_once './include/db.php';
$result = mysql_query("SELECT * FROM transactions", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 1)
{
echo '<p style="color:darkred;">No Transactions Founded</p>';
}
else 
{

?>




                    <div class="panel-body" >
                        <table class="table table-striped task-table" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
                                <th> Date</th>
                                <th>Amount</th>
				<th>Type</th>
				<th>Method</th>
                                <th>Details</th>

				<th>&nbsp;</th>
				<th>&nbsp;</th>
				

                            </thead>
                            <tbody >


<?php
require('include/dbi.php');

$result = mysqli_query($con,"select * from transactions order by date  desc");

while($row = mysqli_fetch_array($result))
  {




  echo "<tr >";


 echo "<td class='table-text'>" . $row['date'] . "</td>";
 echo "<td class='table-text'>" . $row['amount'] . "&nbsp;L.E</td>";
  echo "<td class='table-text'>" . $row['type'] . "</td>";
  echo "<td class='table-text'>" . $row['method'] . "</td>";
  echo "<td class='table-text'>" . $row['details'] . "</td>"; 





echo "<td> <form action='updatetran.php' method='GET'> 
<input type='hidden' name='id' value=" . $row['id'] . ">
<button type='submit' class='btn btn-info'>
<i class='fa fa-btn fa-edit'></i>Edit
                                                </button></form></td>";


echo "<td> <form  method='POST'> 
<input type='hidden' name='id' value=" . $row['id'] . ">
<button type='submit'  name='btn-delete' class='btn btn-danger'>
<i class='fa fa-btn fa-trash'></i>Remove
                                                </button></form></td>";

 echo "</tr >";
}

?>

                            </tbody>
                        </table>
                    </div>
                </div>


        </div>
    </div>

<?php }  require('include/footer.php'); ?>


