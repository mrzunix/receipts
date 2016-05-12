<?php

 require('include/nav.php');

?>

<div class="container">

<div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Seearch For Card
                </div>

                <div class="panel-body">

<center>
                                            <form  method="POST">
<table>
<tr><td><p>FXO Numbers &nbsp;&nbsp;</p></td><td>
						<input type="number" class="form-control" name='fxo' min="0" max="24" step="2" value="0" >
</td></tr>

<tr><td>FXS Numbers &nbsp;&nbsp;</td><td>
						<input type="number" class="form-control" name='fxs' min="0" max="24" step="2" value="0" >
</td></tr>

<tr><td></td><td>
				
</br>
                                                <button type="submit" name="btn-search" class="btn btn-info">
                                                    <i class="fa fa-btn fa-search"></i>Search
                                                </button>
</td></tr></table>
                                            </form>



</div></div></div>



</div>
</center>
<?php

if(isset($_POST['btn-search']))
{


require('include/dbi.php');

$fxo = $_POST['fxo'];
$fxs = $_POST['fxs'];
$result = mysqli_query($con,"select * from sangoma where fxo = '$fxo' and fxs ='$fxs' ");
$num_rows = mysqli_num_rows($result);


if(  $num_rows  < 1)
{
echo '<p style="color:darkred;">No Results Founded</p>';
}
else 

{

?>
<div class="panel panel-default">
                    <div class="panel-heading">
                        Card Result
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
				<th>No</th>
				<th>Code</th>
                                <th>Description</th>
                                <th>fxo</th>
				<th>fxs</th>
                                <th>echo</th>
				<th>price</th>


                            </thead>
                            <tbody>
<?php
$num_rows = 1;
while($row = mysqli_fetch_array($result))



  {

  echo "<tr >";
  echo "<td class='table-text'>" .   $num_rows++ . "</td>";
  echo "<td class='table-text'>" . $row['Code'] . "</td>";
 echo  "<td class='table-text'>" . $row['B'] . "</td>";
  echo "<td class='table-text'>" . $row['fxo'] . "</td>";
  echo "<td class='table-text'>" . $row['fxs'] . "</td>";
  echo "<td class='table-text'>";


if(  $row['echo']   == 1)
{echo '<img src="./images/true.png" width="16px" heights="16px"> ';} 
else 
{echo '<img src="./images/false.png" width="16px" heights="16px" >';} 

 echo"</td>";




  echo "<td class='table-text'>" . $row['price'] . "</td>";
  echo "</tr >";
}



}
}
?>


<?php  require('include/footer.php'); ?>
