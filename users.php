<?php

 require('include/nav.php');
include_once './include/db.php';
if(isset($_POST['btn-delete']))
{



	$id = mysql_real_escape_string($_POST['id']);


if(mysql_query("delete from users where user_id = '$id' "))
	{
	
echo "<meta http-equiv='refresh' content='0; URL=./users.php' />";

	}
	else
	{

echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'>Error .. User Couldn't Be Deleted</center>";

	}
}


if(isset($_POST['btn-adduser']))
{

$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$username = mysql_real_escape_string($_POST['username']);
$email = mysql_real_escape_string($_POST['email']);

$password1 = mysql_real_escape_string($_POST['password1']);
$password2 = mysql_real_escape_string($_POST['password2']);
$newpassword = md5(mysql_real_escape_string($_POST['password1']));


	if( "$password2"   === "$password1")
	
	{


			if(mysql_query("INSERT INTO users(firstname,lastname,username,email,password) VALUES('$firstname','$lastname','$username','$email','$newpassword')"))
			{

			echo "<center><p   class='fa fa-btn fa-info-circle' style='color:green'>User has been created</center>";
			}
			else
			{	
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Failed To add New User</center>";
			}
	}
	else 
	{
	echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Password  Doesn't Matched </center>";
	}

}


?>

<div class="container">

<div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   .. Add New User ..
                </div>

                <div class="panel-body">

<form method="POST" class="form-horizontal">


			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">First Name </label>
                            <div class="col-sm-6">
                                <input type="text" name="firstname" id="task-name" class="form-control"  required>
                            </div>
                        </div>



			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Last Name </label>
                            <div class="col-sm-6">
                                <input type="text" name="lastname" id="task-name" class="form-control" required >
                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">User Name </label>
                            <div class="col-sm-6">
                                <input type="text" name="username" id="task-name" class="form-control" required >
                            </div>
                        </div>



			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Email </label>
                            <div class="col-sm-6">
                                <input type="text" name="email" id="task-name" class="form-control" required>
                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Password </label>
                            <div class="col-sm-6">
                                <input type="password" name="password1" id="task-name" class="form-control" required>
                            </div>
                        </div>

			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Retype Password </label>
                            <div class="col-sm-6">
                                <input type="password" name="password2" id="task-name" class="form-control" required >
                            </div>
                        </div>


<div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" name="btn-adduser" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Add Users
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
			


     </div>
            </div>



            <!-- Current Recepitss -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Users
                    </div>
 

<?php
include_once './include/db.php';
$result = mysql_query("SELECT * FROM users", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 1)
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
                                <th>FirstName</th>
				<th>LastName</th>
				<th>Username</th>
				<th>Email</th>
				<th>Action</th>

                            </thead>
                            <tbody>


<?php
}
require('include/dbi.php');

$result = mysqli_query($con,"select * from users ");
?>

 
                        
<?php
$num_rows = 1;
while($row = mysqli_fetch_array($result))
  {

  echo "<tr >";
  echo "<td class='table-text'>" .   $num_rows++ . "</td>";
  echo "<td class='table-text'>" . $row['firstname'] . "</td>";
  echo "<td class='table-text'>" . $row['lastname'] . "</td>";
  echo "<td class='table-text'>" . $row['username'] . "</td>";
  echo "<td class='table-text'>" . $row['email'] . "</td>";

echo "<td> <form action='updateuser.php' method='GET'> 
<input type='hidden' name='id' value=" . $row['user_id'] . ">
<button type='submit'   class='btn btn-info'>
<i class='fa fa-btn fa-edit'></i>Edit
                                                </button></form></td>";

echo "<td> <form  method='POST'> 
<input type='hidden' name='id' value=" . $row['user_id'] . ">
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
