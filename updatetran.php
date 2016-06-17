<?php 
require('include/nav.php');

						    require('include/db.php');
if(isset($_POST['btn-updatetran']))
{

$id = mysql_real_escape_string($_POST['id']);

	$amount = mysql_real_escape_string($_POST['amount']);
	$method = mysql_real_escape_string($_POST['method']);
	$details = mysql_real_escape_string($_POST['details']);
        $date = mysql_real_escape_string($_POST['date']);



if(mysql_query("update transactions set   amount = '$amount' , method = '$method' , details= '$details' ,date = '$date' where id = '$id'"))
	{
	
	echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> Receipt Has Been Updated Successfully  </center>";
	echo "<meta http-equiv='refresh' content='0; URL=./translist.php' />";

	}
	else
	{

	echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Update Receipt </center>";

	}
}


?>

 <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. Transaction Details ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">
<?php
require('include/dbi.php');
$id = $_GET['id'];
$result = mysqli_query($con,"select * from transactions where id = $id");

while($row = mysqli_fetch_array($result))
  {

?>
				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-6">
                                <input type="text" name="amount" id="task-name" class="form-control"  value="<?php echo "" . $row['amount'] . "";?>" >

                            </div>
                        </div>

<input type="hidden" name="id" id="task-name" class="form-control"  value="<?php echo "" . $row['id'] . "";?>">

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Type  </label>
                            <div class="col-sm-6">
                                <input type="text" name="type" id="task-name" class="form-control"  value="<?php echo "" . $row['type'] . "";?>" disabled>
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-6">
                                <textarea  name="details" id="task-name" class="form-control" ><?php echo "" . $row['details'] . "";?></textarea>
                            </div>
                        </div>






                  <div class="form-group">
                            <label class="col-md-3 control-label" >Date </label>

                            <div class="col-md-6" >
                           <input  type="text" name="date" class="form-control" id="datepicker" value="<?php echo "" . $row['date'] . "";?>">




                            </div>
                        </div>



                        <div id="radioset" class="form-group">
                            <label class="col-md-3 control-label">Payment Method</label>
                            <div class="col-md-6">
<?php
if(  $row['method']   == 'Cash')
{
echo"<input id='radio1' type='radio' name='method' value='Cash' checked='checked'><label for='radio1'> Cash </label><input id='radio2' type='radio'  name='method' value='Bank' ><label for='radio2'>Bank</label";
}
else
{
echo"<input id='radio1' type='radio' name='method' value='Cash' ><label for='radio1'> Cash </label><input id='radio2' type='radio'  name='method' value='Bank' checked='checked'><label for='radio2'>Bank</label";
}
?>
                                

                            </div>
                        </div>

                   <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-updatetran" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



<?php } require('include/footer.php');?>


