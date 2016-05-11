<?php 
require('include/nav.php');

require('include/db.php');
if(isset($_POST['btn-updateuser']))
{
$id = mysql_real_escape_string($_POST['id']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);

$password1 = mysql_real_escape_string($_POST['password1']);
$password2 = mysql_real_escape_string($_POST['password2']);
$newpassword = md5(mysql_real_escape_string($_POST['password1']));


	if( "$password2"   === "$password1")
	
	{


			if(mysql_query("update  users set firstname ='$firstname' , lastname = '$lastname' , username = '$username' , email = '$email' , password = '$newpassword' where user_id = '$id')"))
			{
			echo "<center><p style='color:green'>User has been Updated</center>";
			}
			else
			{?>
       			 <script>alert('Failed To add Update User Info');</script>
       			 <?php
			}
	}
	else 
	{
	echo "<center><p style='color:red'> Password  Doesn't Matched </center>";
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
$id = $_POST['id'];
$result = mysqli_query($con,"select * from users where user_id = $id");

while($row = mysqli_fetch_array($result))
  {

?>
				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Firstname</label>
                            <div class="col-sm-6">
                                <input type="text" name="firstname" id="task-name" class="form-control"  value="<?php echo "" . $row['firstname'] . "";?>" disabled>

                            </div>
                        </div>


		<input type="hidden" name="id" id="task-name" class="form-control"  value="<?php echo "" . $row['id'] . "";?>">
			

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Lastname</label>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" id="task-name" class="form-control"  value="<?php echo "" . $row['lastname'] . "";?>" disabled>

                            </div>
                        </div>

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" name="username" id="task-name" class="form-control"  value="<?php echo "" . $row['username'] . "";?>" disabled>

                            </div>
                        </div>


				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="task-name" class="form-control"  value="<?php echo "" . $row['email'] . "";?>" disabled>

                            </div>
                        </div>


				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="text" name="password1" id="task-name" class="form-control"  disabled>

                            </div>
                        </div>

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Retype Password</label>
                            <div class="col-sm-6">
                                <input type="text" name="password2" id="task-name" class="form-control"  disabled>

                            </div>
                        </div>

                   <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-updateuser" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Update 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



<?php } require('include/footer.php');?>


