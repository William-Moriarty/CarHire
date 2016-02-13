<?php
$hire_date_from = $_POST['hire_date_from'];
$hire_date_to   = $_POST['hire_date_to'];
$hire_custid    = $_POST['hire_custid'];
$hire_carid     = $_POST['hire_carid'];


if ($hire_date_from == '' or $hire_date_to == '' or $hire_custid == '' or $hire_carid == '')
{
header("Location:retry-hire-add.php");
exit();
} 
 else
 {
 $dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
 
 if (mysqli_connect_errno($dbcnx ))
{
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();
}

if ($_POST['submit_hire_details'] == "Submit") {

$hire_date_from = mysqli_real_escape_string($dbcnx, $hire_date_from);
$sql = "INSERT INTO hires(date_from, date_to, customerid, carid) VALUES('$hire_date_from', '$hire_date_to', '$hire_custid', '$hire_carid')";

$res = mysqli_query($dbcnx, $sql);

 if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error(). "</p>");
      }
else
      {
	header("Location:success-hire-add.php");
      }
}mysqli_close($dbcnx);}	
?>