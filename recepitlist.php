<?php

 require('include/nav.php');
include_once './include/db.php';
if(isset($_POST['btn-delete']))
{



	$id = mysql_real_escape_string($_POST['id']);


if(mysql_query("delete from recepits where id = '$id' "))
	{
	
header('Refresh: 0; URL=./recepitlist.php');
	}
	else
	{
		?>
        <script>alert('Recepit Can not Be Removed ');</script>
        <?php
	}
}
?>



<div class="container">




            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Receipts
                    </div>
 

<?php
include_once './include/db.php';
$result = mysql_query("SELECT * FROM recepits", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 1)
{
echo '<p style="color:darkred;">No Recepit Founded</p>';
}
else 
{

?>


                    <div class="panel-body">
                        <table class="table table-striped task-table" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
				<th>no</th>
                                <th>Customer</th>
                                <th>Amount</th>
				<th>Payment Method</th>
                                <th>Due Date</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>

                            </thead>
                            <tbody>


<?php
require('include/dbi.php');

$result = mysqli_query($con,"select * from recepits");

while($row = mysqli_fetch_array($result))
  {




  echo "<tr >";


 echo "<td class='table-text'>" . $row['id'] . "</td>";
 echo "<td class='table-text'>" . $row['customer'] . "</td>";
  echo "<td class='table-text'>" . $row['amount'] . "</td>";
  echo "<td class='table-text'>";
if(  $row['type']   == 1)
{
echo 'Cash ';
}
else 
{
echo 'Cheque';
}
echo"</td>";
  echo "<td class='table-text'>" . $row['date'] . "</td>";

echo "<td> <form action='updaterecepit.php' method='POST'> 
<input type='hidden' name='id' value=" . $row['id'] . ">
<button type='submit'  name='btn-delete' class='btn btn-info'>
<i class='fa fa-btn fa-tag'></i>Edit
                                                </button></form></td>";


  echo "<td class='table-text'>
<form action='recepitdetails.php' method='POST'> 
<input type='hidden' name='id' value=" . $row['id'] .">
<button type='submit'  name='btn-delete' class='btn btn-primary'>
<i class='fa fa-btn fa-tag'></i>View
                                                </button>
</form></td>";


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

