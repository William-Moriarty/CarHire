<?php
$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

 $idpost = (int) $_POST['idpost'] ;
 $manupost   = $_POST['manupost'];
 $modelpost  = $_POST['modelpost'];
 $yearpost   = $_POST['yearpost'];
 $colourpost = $_POST['colourpost'];
 $regpost    = $_POST['regpost'];
 $fuelpost   = $_POST['fuelpost'];
 $ratepost   = $_POST['ratepost'];

if (!$idpost == '') {

{
$sql = "SELECT * from cars WHERE carid like '$idpost'";
}
}

/*if ($modelpost and $yearpost) {

{
$sql = "SELECT * from cars WHERE model like '$modelpost'
(select * from cars whereyearOfMake like '$yearpost')";
}
} */

if (!$manupost == '') {

{
$sql = "SELECT * from cars WHERE manufacturer like '%$manupost%'";
}
} 

if (!$modelpost == '') {

{
$sql = "SELECT * from cars WHERE model like '%$modelpost%'";
}
} 

if (!$yearpost =='') {

{
$sql = "SELECT * from cars WHERE yearOfMake like '%$yearpost%'";
}
}

if (!$colourpost =='') {

{
$sql = "SELECT * from cars WHERE colour like '%$colourpost%'";
}
}

if (!$regpost =='') {

{
$sql = "SELECT * from cars WHERE registration like '%$regpost%'";
}
}

if (!$fuelpost =='') {

{
$sql = "SELECT * from cars WHERE fuel_type like '%$fuelpost%'";
}
}

if (!$ratepost =='') {

{
$sql = "SELECT * from cars WHERE rate like '%$ratepost%'";
}
}    

else if ($idpost == '' and $manupost == '' and $modelpost =='' and $yearpost == '' and $colourpost=='' and $regpost=='' and $fuelpost=='' and $ratepost==''){

{
$sql = "SELECT * from cars";
}
}


$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error());
        exit();
    }

  
else
	{
  
  if(mysqli_num_rows($res)< 1){
  //there are no customer
  $display_block = "<p><em> No cars were found under this query<em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Car ID</th>
   <th>Manufacturer</td>
   <th>Model</td>
   <th>Year of Make</td>
   <th>Colour</td>
   <th>Registration</td>
   <th>Fuel Type</td>
   <th>Rate</td>
   </tr>
END_OF_TEXT;
   
   while($car_info=mysqli_fetch_array($res)){
   
   $carid=$car_info['carid'];
   $carmanu=stripslashes($car_info['manufacturer']);
   $carmodel=stripslashes($car_info['model']);
   $caryear=stripslashes($car_info['yearOfMake']);
   $carcolour=stripslashes($car_info['colour']);
   $carreg=stripslashes($car_info['registration']);
   $carfuel=stripslashes($car_info['fuel_type']);
   $carrate=stripslashes($car_info['rate']);
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$carid</td>
      <td>$carmanu</td>
      <td>$carmodel</td>
      <td>$caryear</td>
      <td>$carcolour</td>
      <td>$carreg</td>
      <td>$carfuel</td>
      <td>$carrate</td>
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
    <title>AutoHire Tralee - Admin/Query cars</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
   <style>
   
    p {
    font-size:1.5em}
   
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
    
    #formcardiv{

    margin-left: 10%;
    width:35%;
    float: left;
    }
    
      #searchid{
     
      width: 30%;
      margin-right: 10%;
      float: right;
      padding-bottom: 46px;
      }
      
    #delcar{
 
    width:30%;
    margin-right:10%;
    float:right;
    padding-top:5px;
    
    }
    
    #querycarforms{
    width:300px;
    margin:0 auto;
    }
      
    #clearblock{
    clear:both;
  
    height: 50px; 
    }
  
  table{
  margin: 0 auto;
  border: 1px solid black;
  border-collapse:collapse;
  
  
  }
    th{
    border: 1px solid black;
    padding:6px;
    font-weight:bold;
    background:#ccc;
   }
  td{
   border: 1px solid black;
    padding:6px;
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
              <a href="view-cars.php">Cars</a>
              <a href="../hire_functions/hire-a-car-form.php">Hires</a>
              <a href="../cust_functions/add-a-customer-form.php">Join Us!</a>
              <a href="../testpage.html">Contact Us</a>
            </div>
         </div>
  </nav>
  
  
  

 <div id="text"> 
  <em> Admin - Manage Cars</em>
   </div>    
         <div id="menubox2">
            <div class="menuitems">
              <a href="manage-cars.php" class="active">Manage Cars</a>
              <a href="../cust_functions/manage-customers.php">Manage Customers</a>
              <a href="../hire_functions/manage-hires.php">Manage Hires</a>
            </div>
         </div>
  

 
 <div class="topblock"> </div> 

 <div id="clearblock"> </div> 
 
 
<div id="querycarforms">
<fieldset>
<legend>Query Car</legend>
<form action= "query-cars.php" method="post">

      <label> Car ID:</label>
      <input type ="text" name="idpost">
      
      <label> Manufacturer:</label>
      <input type ="text" name="manupost">
      
      <label> Model:</label>
      <input type ="text" name="modelpost">
      
      <label> Year of Make:</label>
      <input type ="text" name="yearpost">
      
      <label>Colour:</label>
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
 
 <div id="carquerylist">
  <h1> Your Query Results: </h1>
  <?php echo $display_block; ?>
 </div>
 <div id="clearblock"> </div> 
 <div class="topblock"> </div>    
            
  
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