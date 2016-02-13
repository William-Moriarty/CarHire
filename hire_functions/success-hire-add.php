<?php
$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$sql = "SELECT * from cars ";
//$sql = "SELECT * from cars WHERE colour LIKE 'black' ";
$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  //there are no customer
  $display_block = "<p><em> No cars</em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Manufacturer</th>
   <th>Model</td>
   <th>Year Made</td>
   <th>Colour</td>
   <th>Fuel Type</td>
   </tr>
END_OF_TEXT;
   
   while($car_info=mysqli_fetch_array($res)){
   
    $manufacturer=$car_info['manufacturer'];
    $model=stripslashes($car_info['model']);
    $yearOfMake=stripslashes($car_info['yearOfMake']);
    $colour=stripslashes($car_info['colour']);
    $fuel_type=stripslashes($car_info['fuel_type']);
   
   //add to display
      $display_block .= <<<END_OF_TEXT
     
     <tr><td>$manufacturer</td>
    <td>$model</td>
      <td>$yearOfMake</td>
      <td>$colour</td>
      <td>$fuel_type</td>
      </tr>
END_OF_TEXT;
      
   
   }
  //free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
   $display_block .="</table>";
  }
  
  }

	?>



<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>AutoHire Tralee - Hire a car! (Success!)</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
    <style type = "text/css">
    table{
  border: 1px solid black;
  border-collapse:collapse;
  width: 60%;
  margin: 0 auto;
  
  }
    th{
    border: 1px solid black;
    padding:5px;
    width: 5%;
    font-weight:bold;
    background:#323232;
    font-size: 1.2em;
    color: white;
    
   }
  td{
   border: 1px solid black;
   padding:5px;
   font-size: 1.1em;
   text-align:center;
   background:#ccc;
  } 
     
     </style>
  </head>
  <body>
  <div id="bodydiv">
  <div id="maindiv">
  <header>
        <?php
 if(isset($_POST['submithiredetails'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
 
if ($user == 'user' and $pass == 'pass') {

header ("Location:../car_functions/manage-cars.php");
exit();
}
else{
  ?> <div class="loginerror">
  <?php
   echo ("Incorrect Username / Password");
   ?></div>
   
<?php   
}
}
?> 


  <div class="logindiv">
    <fieldset>
      <legend>Admin Login</legend>
      <form action= "success-hire-add.php" method="post">

      <label> User:</label>
      <input type ="text" name="user">
      
      <label> Pass:</label>
      <input type ="text" name="pass">

   
      <div class="loginbuttondiv">      
      <input type="submit" name="submithiredetails" value="Login">
      </div>
      </div>         
    </form>
  </fieldset> 
  </header>
 
 <nav>
        <div id="menubox">
            <div class="menuitems">
              <a href="../frontpage.php" class="active">Home</a>
              <a href="../car_functions/view-cars.php">Cars</a>
              <a href="hire-a-car-form.php">Hires</a>
              <a href="../cust_functions/add-a-customer-form.php">Join Us!</a>
              <a href="../testpage.html">Contact Us</a>
            </div>
         </div>
  </nav>
  
<div class="topblock"> </div>

 <div class="topblock"> </div> 


 <div id="hirebookedpic">
 </div>
 
   
 
 <div class="topblock"> </div> 
 <div class="topblock"> </div>    
 
<div class="returnHome">
 <a href="../frontpage.php"> Return Home</a>
 </div>
 

<div class="topblock"> </div> 
 <div class="topblock"> </div>    

</div>

 </div>
        <!--Index-->
  
  <footer>
  <div class="indexboxes">
    <div class="indextext">
     <ul>
      <li><h4>Index</h4></li>
      <li><a href = '../frontpage.php'>Home</a></li>
      <li><a href = '../car_functions/view-cars.php'>Cars</a></li>
      <li><a href = 'hire-a-car-form.php'>Hires</a></li>
      <li><a href = '../hire_functions/add-a-customer.php'>Join Us!</a></li>
      <li><a href = '../testpage.html'>Contact us</a></li>
     </ul>
      </div>
  </div>
  
  <div class="indexboxes">
        <div class="indextext">
        <ul>
          <li><h4>Hires</h4></li>
          <li><a href = 'hire-a-car-form.php'>Hire a car</a></li>
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
</html>