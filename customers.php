<?php

 require('include/nav.php');
include_once './include/db.php';
if(isset($_POST['btn-delete']))
{



	$id = mysql_real_escape_string($_POST['id']);


if(mysql_query("delete from customers where id = '$id' "))
	{
	
echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> Customer Has Been Deleted Successfully  </center>";
echo "<meta http-equiv='refresh' content='0; URL=./customers.php' />";
	}
	else
	{
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Delete Customer </center>";
	}
}


if(isset($_POST['btn-addcustomer']))
{


	$customer = mysql_real_escape_string($_POST['name']);



if(mysql_query("INSERT INTO customers (customer ) VALUES ('$customer')"))
	{
	
echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> New Customer Has Been Created Successfully  </center>";

	}
	else
	{
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Create Customer </center>";
	}
}


?>

<div class="container">

<div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. Add New Customer ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">


			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Customer Name </label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" >
                            </div>
                        </div>

<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-addcustomer" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Recepit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			






            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Customers
                    </div>
 

<?php
include_once './include/db.php';
$result = mysql_query("SELECT * FROM customers", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 2)
{
echo '<p style="color:darkred;">No Customer Founded</p>';
}
else 
{

?>


                    <div class="panel-body">
                        <table class="table table-striped task-table" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
				<th>no</th>
                                <th>Customer Name</th>
				<th>Action</th>

                            </thead>
                            <tbody>


<?php
}
require('include/dbi.php');

$result = mysqli_query($con,"select * from customers where id > 1");
?>

 
                        
<?php
$num_rows = 1;
while($row = mysqli_fetch_array($result))


  {
  echo "<tr >";
  echo "<td class='table-text'>" .   $num_rows++ . "</td>";
  echo "<td class='table-text'>" . $row['customer'] . "</td>";
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
<?php  require('include/footer.php'); ?>
