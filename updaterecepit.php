<?php 
require('include/nav.php');

						    require('include/db.php');
if(isset($_POST['btn-updaterecepit']))
{

$id = mysql_real_escape_string($_POST['id']);

	$amount = mysql_real_escape_string($_POST['amount']);
	$amountletters = mysql_real_escape_string($_POST['amountletters']);
	$date = mysql_real_escape_string($_POST['date']);
	$type = mysql_real_escape_string($_POST['type']);
	$bank = mysql_real_escape_string($_POST['bank']);
	$notes = mysql_real_escape_string($_POST['notes']);



if(mysql_query("update recepits set   amount = '$amount' , amountletters = '$amountletters' , note = '$notes' , bank = '$bank' ,date = '$date' , type = $type  where id = '$id'"))
	{
	
	echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> Receipt Has Been Updated Successfully  </center>";
	echo "<meta http-equiv='refresh' content='0; URL=./recepitdetails.php?id=$id' />";

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
                   .. Cash Recepit ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">
<?php
require('include/dbi.php');
$id = $_GET['id'];
$result = mysqli_query($con,"select * from recepits where id = $id");

while($row = mysqli_fetch_array($result))
  {

?>
				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Customer</label>
                            <div class="col-sm-6">
                                <input type="text" name="customer" id="task-name" class="form-control"  value="<?php echo "" . $row['customer'] . "";?>" disabled>

                            </div>
                        </div>
<input type="hidden" name="id" id="task-name" class="form-control"  value="<?php echo "" . $row['id'] . "";?>">
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount  </label>
                            <div class="col-sm-6">
                                <input type="text" name="amount" id="task-name" class="form-control"  value="<?php echo "" . $row['amount'] . "";?>">
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount In Letters</label>
                            <div class="col-sm-6">
                                <textarea  name="amountletters" id="task-name" class="form-control" ><?php echo "" . $row['amountletters'] . "";?></textarea>
                            </div>
                        </div>


    <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Notes</label>
                            <div class="col-sm-6">
                                <textarea  name="notes" id="task-name" class="form-control" ><?php echo "" . $row['note'] . "";?></textarea>
                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Withdraw To </label>
                            <div class="col-sm-6">
                                <input type="text" name="bank" id="task-name" class="form-control"  value="<?php echo "" . $row['bank'] . "";?>">
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
if(  $row['type']   == 1)
{
echo"<input id='radio1' type='radio' name='type' value='1' checked='checked'><label for='radio1'> Cash </label><input id='radio2' type='radio'  name='type' value='0' ><label for='radio2'>Cheque</label";
}
else
{
echo"<input id='radio1' type='radio' name='type' value='1' ><label for='radio1'> Cash </label><input id='radio2' type='radio'  name='type' value='0' checked='checked' ><label for='radio2'>Cheque</label";
}
?>
                                

                            </div>
                        </div>

                   <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-updaterecepit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update Receipt
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



<?php } require('include/footer.php');?>


