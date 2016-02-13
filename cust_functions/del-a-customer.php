<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>AutoHire Tralee - Admin/Delete customer</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
   <style>
   
    fieldset{
    font-size:1.75em;
    height:500px;
    padding-bottom:10px;
    }
    
    input, textarea{
    width: 180px;
    margin-bottom: 30px;
    margin-top:20px;}
    
    textarea{width: 250px;height: 150px; }
    
    label{
    float: left;
    width: 115px;
    font-weight: bold;
    padding-top:21px;
    padding-left:50px; 
    padding-right:20px;}
    
    #submitdiv {
    padding-top:10px;
     margin-left: 33.5%;
     width:22%;
    }
    
    </style>
    </head>
    <body>
    <div id="bodydiv">
  <div id="maindiv">
  <header>
  
  </header>
 
  <nav>
        <div id="menubox">
            <div class="menuitems">
              <a href="../frontpage.php" class="active">Home</a>
              <a href="../car_functions/view-cars.php">Cars</a>
              <a href="../hire_functions/hire-a-car-form.php">Hires</a>
              <a href="add-a-customer-form.php">Join Us!</a>
              <a href="../testpage.html">Contact Us</a>
            </div>
         </div>
  </nav>
  
 <div id="text"> 
  <em> Admin - Manage Customers</em>
   </div>    
         <div id="menubox2">
            <div class="menuitems">
              <a href="../car_functions/manage-cars.php" class="active">Manage Cars</a>
              <a href="manage-customers.php">Manage Customers</a>
              <a href="../hire_functions/manage-hires.php">Manage Hires</a>
            </div>
         </div>
  
<?php
$custid = $_POST['custid'];

if (!$custid == '' or is_numeric($custid))
{

$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

$sql = "DELETE from customer WHERE custid = $custid";
$res = mysqli_query($dbcnx, $sql);

$count=0;

if($res){
		$count = mysqli_affected_rows($dbcnx);
	}
  mysqli_close($dbcnx);		
}

?>

 
<div class="topblock"> </div>

 <div class="topblock"> </div> 


 <div id="msg">
 <?php 
  if($count > 0){
  
            echo("Customer no. " . " ". $custid. " " . "has been deleted successfully\n");
             }
             
             else if ($id == '') {
             echo "<em>No id was selected for deletion</em><br> ";
             }
             
             else{
             echo "<em>No such record deleted</em> <br> "; /* . mysqli_error($dbcnx);*/
             }
   ?>
 </div>
 
 <div class="topblock"> </div> 
 <div class="topblock"> </div>    
 
<!--<div class="returnHome">
 <a href="page4.php"> Return Home</a>
 </div> -->





 <div class="topblock"> </div>    
           
  
  </div>
     <!--Index-->
  
  <footer>
  <div class="indexboxes">
    <div class="indextext">
     <ul>
      <li><h4>Index</h4></li>
      <li><a href = '../frontpage.php'>Home</a></li>
      <li><a href = '../car_functions/view-cars.php'>Cars</a></li>
      <li><a href = '../hire_functions/hire-a-car-form.php'>Hires</a></li>
      <li><a href = 'add-a-customer.php'>Join Us!</a></li>
      <li><a href = '../testpage.html'>Contact us</a></li>
     </ul>
      </div>
  </div>
  
  <div class="indexboxes">
        <div class="indextext">
        <ul>
          <li><h4>Hires</h4></li>
          <li><a href = '../car_functions/hire-a-car-form.php'>Hire a car</a></li>
          <li><a href = '../testpage.html'>Special Offers</a></li>
          <li><a href = '../testpage.html'>Returns</a></li>
          <li><a href = '../testpage.html'>Terms and Conditions</a></li>
         </ul>       
         </div>
         <div id="block3"></div>  
  </div>
  
  <div class="indexboxes">
       <div class="indextext">
         <ul>
          <li><h4>About us</h4></li>
          <li><a href = '../testpage.html'>Location</a></li>
          <li><a href = '../testpage.html'>History</a></li>
          <li><a href = '../testpage.html'>Proprietor</a></li>
          <li><a href = '../testpage.html'>Contact</a></li>
          <li><a href = '../testpage.html'>Help</a></li>
         </ul>         
        </div>
        <div id="block4"></div>     
  </div>
  
  <div class="indexboxes">
    <div class="indextext">
    <ul>
      <li><h4> Search by Type</h4></li>
      <li><a href = '../testpage.html'>Car Id</a></li>
      <li><a href = '../testpage.html'>Manufacturer</a></li>
      <li><a href = '../testpage.html'>Model</a></li>
      <li><a href = '../testpage.html'>Year Made</a></li>
      <li><a href = '../testpage.html'>Colour</a></li>
      <li><a href = '../testpage.html'>Fuel Type</a></li>
      <li><a href = '../testpage.html'>Rate</a></li>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </ul>
    </div>   
  </div>
  
  
  <div class="footwrapper">
  
  <div class="copyright">
  &copy; Copyright AutoHire Tralee 2014.
  </div>
  
  <div class="backtotop">
    <a href="#top">BACK TO TOP</a>
    </div>
   
  </div>
   
  </footer>
    </body>