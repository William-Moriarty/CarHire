<?php
$cust_forename = $_POST['cust_forename'];
$cust_surname  = $_POST['cust_surname'];
$cust_address  = $_POST['cust_address'];
$cust_email    = $_POST['cust_email'];
$cust_phone    = $_POST['cust_phone'];

if ($cust_forename == '' or $cust_surname == '' or $cust_address == '' or $cust_email == '' or $cust_phone == '')
{
/* REFERENCE --- http://bytes.com/topic/php/answers/872299-how-do-i-programmatically-change-different-web-page*/
header("Location:retry-cust-add.php");
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

if ($_POST['submit_cust_details'] == "Submit") {

$cust_forename = mysqli_real_escape_string($dbcnx, $cust_forename);
$sql = "INSERT INTO customer(forname,surname,address,email, phoneNo) VALUES('$cust_forename', '$cust_surname', '$cust_address', '$cust_email', '$cust_phone')";

$res = mysqli_query($dbcnx, $sql);

 if ($res == 0) 
      {
        echo("<p>Error registering: " . mysqli_error(). "</p>");
      }
else
      {
header("Location:success-cust-add.php");;
      }
}mysqli_close($dbcnx);}	
?>