<?php


 require('include/nav.php');
include_once './include/db.php';
$sdate = $_GET['sdate'];
$edate = $_GET['edate'];

if(isset($_POST['btn-delete']))
{



	$id = mysql_real_escape_string($_POST['id']);


if(mysql_query("delete from recepits where id = '$id' "))
	{

  echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> Receipt Has Been Deleted Successfully  </center>";
	echo "<meta http-equiv='refresh' content='0; URL=./recepitget.php?sdate=$sdate&edate=$edate' />";
	}
	else
	{
	echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Delete The Receipt </center>";
	}
}
?>



<div class="container">



       <div class="panel panel-default">
                    <div class="panel-heading">
                        Search By Date
                    </div>
<br>
<table width="100%" >
<tr>
<form method="GET"  action="recepitget.php">
            <td>      <div class="form-group">
                            <label class="col-md-3 control-label " >Start Date </label>

                            <div class="col-md-6" >
                           <input  type="text" name="sdate" class="form-control" id="datepicker" required>


                            </div>
                        </div>

               </td>
<td>   <div class="form-group">
                            <label class="col-md-3 control-label " >End Date </label>

                            <div class="col-md-6" >
                           <input  type="text" name="edate" class="form-control" id="datepicker1" required>


                            </div>
                        </div>
</td>
<td>
 <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-search"></i>Search
                                </button>
                            </div>
                        </div>
</td>
</form>
</tr></table>
<br>
</div>
            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Receipts
                    </div>
 

<?php
include_once './include/db.php';

$result = mysql_query("SELECT * FROM recepits where date >= '$sdate' AND date <= '$edate'  order by date  DESC ", $db);
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
				<th>No</th>
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


$result = mysqli_query($con,"select * from recepits where date >= '$sdate' AND date <= '$edate'  order by date  DESC");
while($row = mysqli_fetch_array($result))
  {




  echo "<tr >";


 echo "<td class='table-text'><a href='./recepitdetails.php?id=" . $row['id'] . "'>" . $row['id'] . "</td>";
 echo "<td class='table-text'><a href='./recepitdetails.php?id=" . $row['id'] . "'>" . $row['customer'] . "</td>";
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




  echo "<td class='table-text'>
<form action='recepitdetails.php' method='Get'> 
<input type='hidden' name='id' value=" . $row['id'] .">
<button type='submit'  class='btn btn-primary'>
<i class='fa fa-btn fa-tag'></i>View
                                                </button>
</form></td>";
echo "<td> <form action='updaterecepit.php' method='GET'> 
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


