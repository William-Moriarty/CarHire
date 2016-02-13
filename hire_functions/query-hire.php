<?php
$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

 $idpost = (int) $_POST['idpost'] ;
 $datefrompost    = $_POST['datefrompost'];
 $datetopost      = $_POST['datetopost'];
 $customeridpost  = $_POST['customeridpost'];
 $caridpost       = $_POST['caridpost'];
 $returnedpost    = $_POST['returnedpost'];
 

if (!$idpost == '') {

{
$sql = "SELECT * from hires WHERE hireid like '$idpost'";
}
}

/*if ($modelpost and $yearpost) {

{
$sql = "SELECT * from cars WHERE model like '$modelpost'
(select * from cars whereyearOfMake like '$yearpost')";
}
} */

if (!$datefrompost == '') {

{
$sql = "SELECT * from hires WHERE date_from like '%$datefrompost%'";
}
} 

if (!$datetopost == '') {

{
$sql = "SELECT * from hires WHERE date_to like '%$datetopost%'";
}
} 

if (!$customeridpost =='') {

{
$sql = "SELECT * from hires WHERE customerid like '%$customeridpost%'";
}
}

if (!$caridpost =='') {

{
$sql = "SELECT * from hires WHERE carid like '%$caridpost%'";
}
}

if (!$returnedpost =='') {

{
$sql = "SELECT * from hires WHERE returned like '%$returnedpost%'";
}
}
    

else if ($idpost == '' and $datefrompost == '' and $datetopost =='' and $customeridpost == '' and $caridpost=='' and $returnedpost==''){

{
$sql = "SELECT * from hires";
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
  $display_block = "<p><em> No hiress were found under this query<em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Hire ID</th>
   <th>Date From</td>
   <th>Date To</td>
   <th>Cust Id</td>
   <th>Car Id</td>
   <th>Returned?</td>
   </tr>
END_OF_TEXT;
   
   while($hire_info=mysqli_fetch_array($res)){
   
   $hireid=$hire_info['hireid'];
   $hiredatefrom=stripslashes($hire_info['date_from']);
   $hiredateto=stripslashes($hire_info['date_to']);
   $hirecustid=stripslashes($hire_info['customerid']);
   $hirecarid=stripslashes($hire_info['carid']);
   $hirereturned=stripslashes($hire_info['returned']);
 
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$hireid</td>
      <td>$hiredatefrom</td>
      <td>$hiredateto</td>
      <td>$hirecustid</td>
      <td>$hirecarid</td>
      <td>$hirereturned</td>
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
    <title>AutoHire Tralee - Admin/Query hire</title>
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

 <div id="clearblock"> </div> 
 
 
<div id="querycarforms">
<fieldset>
<legend>Query Hires</legend>
<form action= "query-hire.php" method="post">

      <label> Hire ID:</label>
      <input type ="text" name="idpost">
      
      <label> Date From:</label>
      <input type ="text" name="datefrompost">
      
      <label> Date To:</label>
      <input type ="text" name="datetopost">
      
      <label> Customer Id:</label>
      <input type ="text" name="customeridpost">
      
      <label> Car Id:</label>
      <input type ="text" name="caridpost">
      
      <label> Returned?:</label>
      <input type ="text" name="returnedpost">
      
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