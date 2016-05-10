<?php 
require('include/nav.php');
require('include/db.php');
if(isset($_POST['btn-reset']))
{

$id = $_SESSION['user'];
$password1 = mysql_real_escape_string($_POST['password1']);
$password2 = mysql_real_escape_string($_POST['password2']);
$newpassword = md5(mysql_real_escape_string($_POST['password1']));



	if( "$password2"   === "$password1")
	
	{


			if(mysql_query("update users set   password = '$newpassword'  where user_id = '$id'"))
			{
			echo "<center><p style='color:green'>Your Password Has Been Updated</center>";
			}
			else
			{?>
       			 <script>alert('Failed To add New Recepit');</script>
       			 <?php
			}
	}
	else 
	{
	echo "<center><p style='color:red'>Your New Password  Doesn't Matched </center>";
	}
}

?>

 <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Reset Password
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">
<?php
require('include/dbi.php');
$id = $_SESSION['user'];
$result = mysqli_query($con,"select * from users where user_id = $id");

while($row = mysqli_fetch_array($result))
  {

?>
				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" name="customer" id="task-name" class="form-control"  value="<?php echo "" . $row['username'] . "";?>" disabled>

                            </div>
                        </div>


                       <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">New Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password1" placeholder="New Password" required>

                        
                            </div>
                        </div>
                       <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Retype password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password2" placeholder="Retype New Password" required>

                        
                            </div>
                        </div>


                   <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-reset" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



<?php } require('include/footer.php');?>


