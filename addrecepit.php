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
header('Refresh: 0; URL=./lastrecepit.php');
	

	}
	else
	{
		?>
        <script>alert('Failed To add New Recepit');</script>
        <?php
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
				<select name="customer" id="task-name" class="form-control">
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
                                <input type="text" name="amount" id="task-name" class="form-control" >
                            </div>
                        </div>
			
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount In Letters</label>
                            <div class="col-sm-6">
                                <textarea  name="amountletters" id="task-name" class="form-control" ></textarea>
                            </div>
                        </div>


    <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Notes</label>
                            <div class="col-sm-6">
                                <textarea  name="notes" id="task-name" class="form-control" value="{{ old('note') }}"></textarea>
                            </div>
                        </div>



			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Withdraw To </label>
                            <div class="col-sm-6">
                                <input type="text" name="bank" id="task-name" class="form-control" >
                            </div>
                        </div>

                  <div class="form-group">
                            <label class="col-md-3 control-label" >Date </label>

                            <div class="col-md-6" >
                           <input  type="text" name="date" class="form-control" id="datepicker">




                            </div>
                        </div>



                        <div class="form-group">
                            <label class="col-md-3 control-label">Payment Method</label>
                            <div class="col-md-6">

                                <input type="radio" name="type" value="1"> Cash
                                <input type="radio"  name="type" value="0" checked="checked">Cheque

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


