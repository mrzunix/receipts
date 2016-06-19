<?php

 require('include/nav.php');
include_once './include/db.php';


if(isset($_POST['btn-withdraw']))
{


	$amount = mysql_real_escape_string($_POST['amount']);
        $method = mysql_real_escape_string($_POST['method']);
        $details = mysql_real_escape_string($_POST['details']);
        $date = mysql_real_escape_string($_POST['date']);



if(mysql_query("INSERT INTO transactions (amount,type,method,details,date) VALUES ('$amount' ,'Payment' , '$method' , '$details','$date')"))
	{

echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'>  Successfully Transaction   </center>";

	}
	else
	{
echo"INSERT INTO deposits (amount,type,details) VALUES ('$amount' , '$type' , '$details')";
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Transaction Failed </center>";
	}
}


?>

<div class="container">

<div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. Withdraw..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">


			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Amount</label>
                            <div class="col-sm-6">
                                <input type="text" name="amount" id="task-name" class="form-control" required>
                            </div>
                        </div>


 				<div id="radioset" class="form-group">
                            <label class="col-md-3 control-label">Type</label>
                            <div class="col-md-6">

                                <input id="radio1" type="radio" name="method" value="Cash"><label for="radio1"> Cash</label>
                                <input id="radio2"type="radio"  name="method" value="Bank" checked="checked"><label for="radio2">Bank</label>




                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-6">
                                <textarea  name="details" id="task-name" class="form-control" value="{{ old('note') }}" required></textarea>
                            </div>
                        </div>

             <div class="form-group">
                            <label class="col-md-3 control-label " >Date </label>
			    <div class="col-md-6" >
                           <input  type="text" name="date" class="form-control" id="datepicker" required>
                     </div>
                  </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-withdraw" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Payment
                                </button>
                            </div>
                        </div>
                    

</form>
                </div>
            </div>
			



        </div>
    </div>
<?php  require('include/footer.php'); ?>
