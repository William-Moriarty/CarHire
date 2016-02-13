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
   <th>Car ID</th>
   <th>Manufacturer</td>
   <th>Model</td>
   <th>Year Made</td>
   <th>Colour</td>
   <th>Fuel Type</td>
   <th>Rate (Per Day)</td>
   </tr>
END_OF_TEXT;
   
   while($car_info=mysqli_fetch_array($res)){
    $carid=$car_info['carid'];
    $manufacturer=stripslashes($car_info['manufacturer']);
    $model=stripslashes($car_info['model']);
    $yearOfMake=stripslashes($car_info['yearOfMake']);
    $colour=stripslashes($car_info['colour']);
    $fuel_type=stripslashes($car_info['fuel_type']);
    $rate=stripslashes($car_info['rate']);
   
   //add to display
      $display_block .= <<<END_OF_TEXT
     
     <tr><td>$carid</td>
     <td>$manufacturer</td>
    <td>$model</td>
      <td>$yearOfMake</td>
      <td>$colour</td>
      <td>$fuel_type</td>
      <td>$rate</td>
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
    <title>AutoHire Tralee</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
    <style type = "text/css">
    
     fieldset{
    font-size:1em;
    padding-bottom:10px;
    }
    
    input, textarea{
    width: 100px;
    margin-bottom: 5px;
    margin-top:5px;}
    
    textarea{width: 250px;height: 150px; }
    
    label{
    float: left;
    width: 115px;
    font-weight: bold;
    padding-top:5px;
    padding-left:5px; 
    padding-right:5px;}
    
    .submitdiv {
    padding-top:10px;
     margin-left: 35%;
     width:22%;
    }
    table{
  border: 1px solid black;
  border-collapse:collapse;
  width: 100%;
  margin: 0 auto;
  
  }
    th{
    border: 1px solid black;
    padding:5px;
    width: 15%;
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
  
  h1{
   text-align:center;
  } 
  
  #querycarforms{
    width:300px;
    float:left;
    }
     
     </style>
  </head>
  <body>
  <div id="bodydiv">
  <div id="maindiv">
  
  <header>
   <!--REFERENCES for isset to avoid error messages if varibales not defined when page first loads-->
<!--https://www.youtube.com/watch?v=Qq8ZTMfs18k-->
<!-- http://stackoverflow.com/questions/4261133/php-notice-undefined-variable-and-notice-undefined-index--> 
 
 
 <?php
 if(isset($_POST['submitdetails'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
 
if ($user == 'user' and $pass == 'pass') {

header ("Location:manage-cars.php");
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
      <form action= "view-cars.php" method="post">

      <label> User:</label>
      <input type ="text" name="user">
      
      <label> Pass:</label>
      <input type ="text" name="pass">

   
      <div class="loginbuttondiv">      
      <input type="submit" name="submitdetails" value="Login">
      </div>
      </div>         
    </form>
  </fieldset> 
  
  
  </header>
 
  <nav>
        <div id="menubox">
            <div class="menuitems">
              <a href="../frontpage.php" class="active">Home</a>
              <a href="view-cars.php">Cars</a>
              <a href="../hire_functions/hire-a-car-form.php">Hires</a>
              <a href="../cust_functions/add-a-customer-form.php">Join Us!</a>
              <a href="../testpage.html">Contact Us</a>
            </div>
         </div>
  </nav>
  
<div class="topblock"> </div>
<div class="topblock"> </div>

<div id="checkcarspic">
</div>
 <div class="topblock"> </div>
  <div class="bestrentpricepic">
 </div>

<div class="topblock"> </div>
<div class="topblock"> </div>

  
  
  <div id="querycarforms">
<div id="querycarspic"></div>
<fieldset>
<form action= "query-cars2.php" method="post">

      <label> Car ID:</label>
      <input type ="text" name="idpost">
      
      <label> Manufacturer:</label>
      <input type ="text" name="manupost">
      
      <label> Model:</label>
      <input type ="text" name="modelpost">
      
      <label> Year of Make:</label>
      <input type ="text" name="yearpost">
      
      <label> Colour:</label>
      <input type ="text" name="colourpost">
      
      <label> Registration:</label>
      <input type ="text" name="regpost">
      
      <label> Fuel Type:</label>
      <input type ="text" name="fuelpost">
      
      <label> Rate:</label>
      <input type ="text" name="ratepost">
      
      <div class="submitdiv">      
      <input type="submit" name="submitdetails" value="Search">
      </div>      
    </form>
</fieldset>
 </div>
 
  
 <div id="carbox2">
 <div id="ourcarspic"></div>
 <div class="topblock"> </div>
  <?php echo $display_block; ?>
  
  </div>
    

 <div id="clearblock2"> </div>
 <div class="topblock"> </div>
  <div class="topblock"> </div>
   <div class="topblock"> </div>
 <div class="bottomblock"> </div>
</div> 
  <div id="clearblock"> </div>
 </div>
      <!--Index-->
  
  <footer>
  <div class="indexboxes">
    <div class="indextext">
     <ul>
      <li><h4>Index</h4></li>
      <li><a href = '../frontpage.php'>Home</a></li>
      <li><a href = 'view-cars.php'>Cars</a></li>
      <li><a href = '../hire_functions/hire-a-car-form.php'>Hires</a></li>
      <li><a href = '../cust_functions/add-a-customer.php'>Join Us!</a></li>
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