<?php 
require('include/nav.php');

						    require('include/db.php');
if(isset($_POST['btn-updateuser']))
{

$id = mysql_real_escape_string($_POST['updateid']);
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);

$password1 = mysql_real_escape_string($_POST['password1']);
$password2 = mysql_real_escape_string($_POST['password2']);
$newpassword = md5(mysql_real_escape_string($_POST['password1']));


	if( "$password2"   === "$password1")
	
	{


			if(mysql_query("update  users set firstname = '$firstname' , lastname = '$lastname'  , email = '$email' , password = '$newpassword' where user_id = '$id'"))
			{
	echo "<center><p class='fa fa-btn fa-info-circle' style='color:Green'> User Information Has Been Updated Successfully  </center>";
	echo "<meta http-equiv='refresh' content='1; URL=./users.php' />";

			}
			else
			{?>
       			 <script>alert('Failed To add Update User Info');</script>
       			 <?php
			}
	}
	else 
	{
	echo "<center><p class='fa fa-btn fa-warning' style='color:red'> Password  Doesn't Matched </center>";
	}


}


?>

 <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. User Information ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">
<?php
require('include/dbi.php');
$id = $_GET['id'];
$result = mysqli_query($con,"select * from users where user_id = $id");

while($row = mysqli_fetch_array($result))
  {

?>
				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Firstname</label>
                            <div class="col-sm-6">
                                <input type="text" name="firstname" id="task-name" class="form-control"  value="<?php echo "" . $row['firstname'] . "";?>" required>

                            </div>
                        </div>


		<input type="hidden" name="updateid" id="task-name" class="form-control"  value="<?php echo "" . $row['user_id'] . "";?>">
			

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Lastname</label>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" id="task-name" class="form-control"  value="<?php echo "" . $row['lastname'] . "";?>" required>

                            </div>
                        </div>

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-6">
                                <input type="text" name="username" id="task-name" class="form-control"  value="<?php echo "" . $row['username'] . "";?>"  disabled>

                            </div>
                        </div>


				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="task-name" class="form-control"  value="<?php echo "" . $row['email'] . "";?>" required>

                            </div>
                        </div>


				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password1" id="task-name" class="form-control"  required>

                            </div>
                        </div>

				<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Retype Password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password2" id="task-name" class="form-control"  required>

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


