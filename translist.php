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


<tr>
<td>
<div class="btn btn-default ">
<p>Total Deposits Transactions</p>
<p style="font-weight:bold;font-size:18px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as total FROM transactions where type = 'Deposit'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['total'] ; echo '&nbsp; L.E' ;
}
?>
</p>
<hr>
<table align="center"  width="250px">
<tr>
<td>
<p>Bank Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as banktotal FROM transactions where type = 'Deposit' and method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['banktotal'] ; echo '&nbsp; L.E' ;
}
?>
</td>

<td>
<p>Cash Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as cashtotal FROM transactions where type = 'Deposit' and method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['cashtotal'] ; echo '&nbsp; L.E' ;
}
?>
</td>
</tr>
</table>

</div>
</td>

<!----------Cureent ---->
<td>
<div class="btn btn-primary ">
<p>Current Balance </p>
<p style="font-weight:bold;font-size:18px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as dtotal FROM transactions where type = 'Deposit'", $db);
while($row = mysql_fetch_array($result))
  {

$dtotal = mysql_real_escape_string($row['dtotal']);
}

include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as wtotal FROM transactions where type = 'Withdraw'", $db);
while($row = mysql_fetch_array($result))
  {

$wtotal = mysql_real_escape_string($row['wtotal']);
}


$total = $dtotal - $wtotal;
echo $total;echo '&nbsp; L.E'
?>
</p>
<hr>
<table align="center"  width="300px">
<tr>
<td>
<p>Bank Balance</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as bankdtotal FROM transactions where type = 'Deposit' and method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
$bankdtotal = mysql_real_escape_string($row['bankdtotal']);
}

include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as bankwtotal FROM transactions where type = 'Withdraw' and method='Bank'", $db);
while($row = mysql_fetch_array($result))
{
$bankwtotal = mysql_real_escape_string($row['bankwtotal']);
}

$banktotal = $bankdtotal - $bankwtotal;
echo $banktotal;echo '&nbsp; L.E'
?>
</td>
<td>
<p>Cash Balance</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as cashdtotal FROM transactions where type = 'Deposit' and method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
$cashdtotal = mysql_real_escape_string($row['cashdtotal']);
}

include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as cashwtotal FROM transactions where type = 'Withdraw' and method='Cash'", $db);
while($row = mysql_fetch_array($result))
{
$cashwtotal = mysql_real_escape_string($row['cashwtotal']);
}


$cashtotal = $cashdtotal -  $cashwtotal;
echo $cashtotal;echo '&nbsp; L.E'
?>
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
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as total FROM transactions where type = 'Withdraw'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['total'] ; echo '&nbsp; L.E' ;
}
?>
</p>
<hr>
<table align="center"  width="250px">
<tr>
<td>
<p>Bank Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as banktotal FROM transactions where type = 'Withdraw' and method='Bank'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['banktotal'] ; echo '&nbsp; L.E' ;
}
?>
</td>
<td>
<p>Cash Deposit</p>
<p style="font-weight:bold;font-size:16px">
<?php
include_once './include/db.php';
$result = mysql_query("SELECT sum(amount) as cashtotal FROM transactions where type = 'Withdraw' and method='Cash'", $db);
while($row = mysql_fetch_array($result))
  {
echo   $row['cashtotal'] ; echo '&nbsp; L.E' ;
}
?>
</td>
</tr>
</table>

</div>
</td>

</tr>
</table>
</center>


<br>
<div class="container">

            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Receipts
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




                    <div class="panel-body">
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
                            <tbody>


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


