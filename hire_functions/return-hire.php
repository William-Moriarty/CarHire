<!DOCTYPE html>
<html lang='en'>
  <head>
    <title>AutoHire Tralee - Admin/Return Hire</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
   <style>
   
    fieldset{
    font-size:1;
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
    
     #text2{

     text-align: center;
     font-size: 1.3em;
     padding: 15px;
     }
    
    #submitdiv {
     margin-left: 30%;
     width:50%;
     height:30px;
     padding-bottom:5px;
     
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
              <a href="hire-a-car-form.php">Hires</a>
              <a href="../cust_functions/add-a-customer-form.php">Join Us!</a>
              <a href="../testpage.html">Contact Us</a>
            </div>
         </div>
  </nav>
  
 <div id="text"> 
  <em> Admin - Manage Hires</em>
   </div>    
         <div id="menubox2">
            <div class="menuitems">
              <a href="../car_functions/manage-cars.php" class="active">Manage Cars</a>
              <a href="../cust_functions/manage-customers.php">Manage Customers</a>
              <a href="manage-hires.php">Manage Hires</a>
            </div>
         </div>
  

 
 <div class="topblock"> </div> 


      <?php

$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}


$id= (int) $_POST['record'];

$sql="SELECT * FROM hires WHERE hireid=$id";

$res = mysqli_query($dbcnx, $sql);
if ( !$res ) {
        echo('Query failed ' . $sql . ' Error:' . mysqli_error($dbcnx));
        exit();
    }


else 
{
$row = mysqli_fetch_array($res); 
$returned=$row['returned'];
}
//free results
  mysqli_free_result($res);
  
  //close connection
  mysqli_close($dbcnx);
?>
<div id="text2">
<?php 
if ($id == '')  {
echo('<em>NO ID ENTERED, PLEASE RETURN TO MANAGE CUSTOMERS AND ENTER AN ID</em>');
}
 ?>
</div>


<div id="updatebox">
<fieldset>
<legend>Return a car</legend>
   <form action="success-hire-return.php" method="post">
    <input type="hidden" name="ud_id" value="<?php echo $id; ?>">
    
    <label>Return - Y/N? </label>
    <input type="text" name="ud_return" value="<?php echo $returned; ?>"><br /> 
      
 <div id="submitdiv">    
<input type="Submit" value="Return">
</div>
</form>
</fieldset>
 </div>




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