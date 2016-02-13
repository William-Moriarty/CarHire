<?php
$dbcnx = mysqli_connect("localhost", "root", "", "carhiresys");
if (mysqli_connect_errno($dbcnx )){
echo "Failed to connect to MySQL: " .mysqli_connect_error();
exit();}

 $idpost = (int) $_POST['idpost'] ;
 $fornamepost   = $_POST['fornamepost'];
 $surnamepost   = $_POST['surnamepost'];
 $addresspost   = $_POST['addresspost'];
 $emailpost     = $_POST['emailpost'];
 $phonepost     = $_POST['phonepost'];
 

if (!$idpost == '') {

{
$sql = "SELECT * from customer WHERE custid like '$idpost'";
}
}

/*if ($modelpost and $yearpost) {

{
$sql = "SELECT * from cars WHERE model like '$modelpost'
(select * from cars whereyearOfMake like '$yearpost')";
}
} */

if (!$fornamepost == '') {

{
$sql = "SELECT * from customer WHERE forname like '%$fornamepost%'";
}
} 

if (!$surnamepost == '') {

{
$sql = "SELECT * from customer WHERE surname like '%$surnamepost%'";
}
} 

if (!$addresspost =='') {

{
$sql = "SELECT * from customer WHERE address like '%$addresspost%'";
}
}

if (!$emailpost =='') {

{
$sql = "SELECT * from customer WHERE email like '%$emailpost%'";
}
}

if (!$phonepost =='') {

{
$sql = "SELECT * from customer WHERE phoneNo like '%$phonepost%'";
}
}
    

else if ($idpost == '' and $fornamepost == '' and $surnamepost =='' and $addresspost == '' and $emailpost=='' and $phonepost==''){

{
$sql = "SELECT * from customer";
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
  $display_block = "<p><em> No customers were found under this query<em></p>";  }
  else
  {
   //create the display string
   $display_block = <<<END_OF_TEXT
   <table>
   <tr>
   <th>Cust ID</th>
   <th>First Name</td>
   <th>Surname</td>
   <th>Address</td>
   <th>Email</td>
   <th>Phone No</td>
   </tr>
END_OF_TEXT;
   
   while($cust_info=mysqli_fetch_array($res)){
   
   $custid=$cust_info['custid'];
   $custforname=stripslashes($cust_info['forname']);
   $custsurname=stripslashes($cust_info['surname']);
   $custaddress=stripslashes($cust_info['address']);
   $custemail=stripslashes($cust_info['email']);
   $custphone=stripslashes($cust_info['phoneNo']);
 
   //add to display
      $display_block .= <<<END_OF_TEXT
      <tr><td>$custid</td>
      <td>$custforname</td>
      <td>$custsurname</td>
      <td>$custaddress</td>
      <td>$custemail</td>
      <td>$custphone</td>
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
    <title>AutoHire Tralee - Admin/Query customers</title>
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
  

 
 <div class="topblock"> </div> 

 <div id="clearblock"> </div> 
 
 
<div id="querycarforms">
<fieldset>
<legend>Query Customer</legend>
<form action= "query-customer.php" method="post">

      <label> Cust ID:</label>
      <input type ="text" name="idpost">
      
      <label> First Name:</label>
      <input type ="text" name="fornamepost">
      
      <label> Surname:</label>
      <input type ="text" name="surnamepost">
      
      <label> Address:</label>
      <input type ="text" name="addresspost">
      
      <label> Email:</label>
      <input type ="text" name="emailpost">
      
      <label> Phone No:</label>
      <input type ="text" name="phonepost">
      
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
            <!--Index-->
  
  
  
  </div>
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