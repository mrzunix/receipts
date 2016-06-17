
<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', '', 'height=600,width=700');
        mywindow.document.write('<html><head><link href="http://fonts.googleapis.com/earlyaccess/droidarabicnaskh.css" rel="stylesheet" type="text/css" /><title></title><link rel="stylesheet"  href="./css/bootstrap.min.css" type="text/css">');
mywindow.document.write('<body style="font-family: Droid Arabic Naskh;"');

        mywindow.document.write('</head><body><center>');
        mywindow.document.write(data);
        mywindow.document.write('</center></body></html>');
        mywindow.print();
        mywindow.close();

        return true;
    }

</script>


<?php

 require('include/nav.php');
?>

 <div class="panel panel-default">
                    <div class="panel-heading">
		<table width="200%">
       <tr>
<th>Result</th>
<th>
 <button onclick="PrintElem('#result')" type="submit" class="btn btn-default">

                                                    <i class="fa fa-btn fa-print"></i>Print
                                                </button>

</th>

	</tr>
		</table>
                    </div>

                    <div class="panel-body" id="result" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                  


<?php


$from = $_GET['from'];
$to = $_GET['to'];
$type = $_GET['type'];
$method = $_GET['method'];


include_once './include/db.php';
$result = mysql_query("select * from transactions where date >= '$from' and  date <= '$to'and method like '%$method%' and type like'$type%'", $db);
$num_rows = mysql_num_rows($result);




if(  $num_rows  < 1)
{
echo '<p style="color:darkred;">No Results Founded</p>';

}
else 
{

?>

 <div class="panel-body" >
                        <table  class="table table-striped task-table"  width="100%" style="font-family: 'Droid Arabic Naskh', 'Monda', sans-serif;">
                            <thead>
                                <th>Date</th>
                                <th>Amount</th>
				<th>Type</th>
				<th>Method</th>
                                <th>Details</th>



                            </thead>
                            <tbody>


<?php
require('include/db.php');

$result = mysql_query("select * from transactions where date >= '$from' and  date <= '$to'and method like '%$method%' and type like'$type%'", $db);

while($row = mysql_fetch_array($result))
  {




  echo "<tr >";


 echo "<td class='table-text'>" . $row['date'] . "</td>";
 echo "<td class='table-text'>" . $row['amount'] . "&nbsp;L.E</td>";
  echo "<td class='table-text'>" . $row['type'] . "</td>";
  echo "<td class='table-text'>" . $row['method'] . "</td>";
  echo "<td class='table-text'>" . $row['details'] . "</td>"; 







 echo "</tr >";
}
}
?>

                            </tbody>
                        </table>
                    </div>
<?php
 require('include/footer.php');
?>
