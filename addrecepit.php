<?php 
require('include/nav.php');

						    require('include/db.php');
if(isset($_POST['btn-addrecepit']))
{


	$customer = mysql_real_escape_string($_POST['customer']);
	$amount = mysql_real_escape_string($_POST['amount']);
	$amountletters = mysql_real_escape_string($_POST['amountletters']);
	$date = mysql_real_escape_string($_POST['date']);
        $bank = mysql_real_escape_string($_POST['bank']);
	$type = mysql_real_escape_string($_POST['type']);
	$notes = mysql_real_escape_string($_POST['notes']);



if(mysql_query("INSERT INTO recepits (customer, amount, amountletters, type, note , date , bank)

VALUES
('$customer', '$amount', '$amountletters', '$type', '$notes', '$date', '$bank')"))
	{

require('include/dbi.php');
$result = mysqli_query($con,"select id from recepits order by id desc limit 1");
while($row = mysqli_fetch_array($result))
  {
$receiptid = $row['id'];

echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> New Receipt Has Been Created Successfully  </center>";
	echo "<meta http-equiv='refresh' content='0; URL=./recepitdetails.php?id=$receiptid' />";
}
	}
	else
	{
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Create  New Receipt  </center>";
	}
}


?>

 <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. New Receipt ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Customer</label>
                            <div class="col-sm-6">
				<select name="customer" id="task-name" class="form-control" >
						<?php
						    require('include/db.php');
  						   $strSQL = "SELECT customer FROM customers ";
 						   $rs = mysql_query($strSQL);
  						  $nr = mysql_num_rows($rs);
  						  for ($i=0; $i<$nr; $i++) {
  						  $r = mysql_fetch_array($rs);
  						  echo "<OPTION  VALUE=\"" .$r["customer"] . " \">" .$r["customer"] . "  </OPTION>";
  								  }
   						 ?>
				</select> 

                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount </label>
                            <div class="col-sm-6">
                                <input type="text" name="amount" id="task-name" class="form-control" required>
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount In Letters</label>
                            <div class="col-sm-6">
                                <textarea  name="amountletters" id="task-name" class="form-control" required></textarea>
                            </div>
                        </div>


    			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">For</label>
                            <div class="col-sm-6">
                                <textarea  name="notes" id="task-name" class="form-control" value="{{ old('note') }}" required></textarea>
                            </div>
                        </div>



			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Withdraw To </label>
                            <div class="col-sm-6">
                                <input type="text" name="bank" id="task-name" class="form-control" >
                            </div>
                        </div>

                  <div class="form-group">
                            <label class="col-md-3 control-label " >Date </label>

                            <div class="col-md-6" >
                           <input  type="text" name="date" class="form-control" id="datepicker" required>




                            </div>
                        </div>



                        <div id="radioset" class="form-group">
                            <label class="col-md-3 control-label">Payment Method</label>
                            <div class="col-md-6">

                                <input id="radio1" type="radio" name="type" value="1"><label for="radio1"> Cash</label>
                                <input id="radio2"type="radio"  name="type" value="0" checked="checked"><label for="radio2">Cheque</label>




                            </div>
                        </div>

                   <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-addrecepit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Receipt
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



<?php require('include/footer.php');?>


