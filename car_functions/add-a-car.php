<?php

  $car_manu  = $_POST['car_manu'];
  $car_model = $_POST['car_model'];
  $car_year  = $_POST['car_year'];
  $car_colour= $_POST['car_colour'];
  $car_reg   = $_POST['car_reg'];
  $car_fuel  = $_POST['car_fuel'];
  $car_rate  = $_POST['car_rate'];
  
  if ($car_manu == '' or $car_model == '' or $car_year  == '' or $car_colour== ''  or $car_reg  == '' or $car_fuel  == '' or $car_rate == '')
      {
header("Location:retry-car-add.php");
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

if ($_POST['submit_car_details'] == "Add") {

 $car_manu = mysqli_real_escape_string($dbcnx, $car_manu);
 $sql = "INSERT INTO cars(manufacturer,model,yearOfMake,colour,registration,fuel_type,rate) VALUES('$car_manu', '$car_model', '$car_year', '$car_colour', '$car_reg', '$car_fuel',$car_rate)";
 
 $res = mysqli_query ($dbcnx, $sql);
 
 if ($res == 0)
      {
       echo("<p>Error registering: " . mysqli_error(). "</p>");
      }
else
      {
header("Location:success-car-add.php");
      }
}mysqli_close($dbcnx);                                                                                
}
?>