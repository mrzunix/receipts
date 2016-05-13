<?php
require('include/nav.php');
require('include/config.php');


if(isset($_POST['btn-delete']))
{

	$id = mysql_real_escape_string($_POST['id']);
        $file = mysql_real_escape_string($_POST['file']);


if(mysql_query("delete from backups where id = '$id' "))
	{
	system("rm -rf backups/$file");

echo "<meta http-equiv='refresh' content='0; URL=./backup.php' />";
echo "<center><p   class='fa fa-btn fa-info-circle' style='color:green'> Backup Has been Deleted Successfully</center>";

	}
	else
	{
echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'> Cannot Delete Backup </center>";
	}
}




if(isset($_POST['btn-backup']))
{


if(mysql_query("INSERT INTO backups (file,type ) VALUES ('$database$date','Basic')"))
	{
	
 system($basicbackup);
echo "<center><p   class='fa fa-btn fa-info-circle' style='color:green'> Backup  completed Successfully</center>";
	}
	else
	{
	echo "<center><p class='fa fa-btn fa-warning' style='color:darkred'>Error Couldn't Complete backup </center>";
	}
}


?>
<div class="container">






<!----->


  <div class="panel panel-default">
                    <div class="panel-heading">
<table width="160%"><tr><th>Current Backup Files</th><th>



<form method="POST" class="form-horizontal">
<button type="submit" name="btn-backup" class="btn btn-default">
<i class="fa fa-btn fa-plus"></i>Basic Backup
</button></form>


</th></tr></table>
                    </div>
 

<?php
include_once './include/db.php';
$result = mysql_query("SELECT * FROM backups", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 1)
{
echo '<p style="color:darkred;">No Backup Files Founded</p>';
}
else 
{

?>


                    <div class="panel-body">
                        <table class="table table-striped task-table" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
				<th>No</th>
                                <th>Type</th>
                                <th>Date</th>
				<th> &nbsp;</th>

                            </thead>
                            <tbody>


<?php
}
require('include/dbi.php');

$result = mysqli_query($con,"select * from backups ");
?>

 
                        
<?php
$num_rows = 1;
while($row = mysqli_fetch_array($result))
  {

  echo "<tr >";
  echo "<td class='table-text'>" .   $num_rows++ . "</td>";
  echo "<td class='table-text'>" . $row['type'] . "</td>";
  echo "<td class='table-text'>" . $row['Date'] . "</td>";





echo "<td> <form  method='POST'> 
<input type='hidden' name='id' value=" . $row['id'] . ">
<input type='hidden' name='file' value=" . $row['file'] . ">
<button type='submit'  name='btn-delete' class='btn btn-danger'>
<i class='fa fa-btn fa-trash'></i>Remove
                                                </button></form></td>";

echo "<td> 

<a href=$store" . $row['file'] . " class='btn btn-default'>
<i class='fa fa-btn fa-cloud-download'></i>Download
                                                </form></td>";

 echo "</tr >";
}

?>

                            </tbody>
                        </table>
                    </div>
                </div>


        </div>
    </div>
<?php require('include/footer.php');?>
