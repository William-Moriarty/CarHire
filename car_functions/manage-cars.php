 <!DOCTYPE html>
<html lang='en'>
  <head>
    <title>AutoHire Tralee - Admin/Manage Cars</title>
    <meta charset='utf-8'>
    <meta name='description' content='Website for car rentals'>
    <meta name='keywords' content='Car, Cars,hire car,hire cars,car hires,car rental, rent a car, hire a car'>                            
    <meta name='author' content='William Moriarty, t00119587'>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link href='../images/favicon.png' rel='shortcut icon' type='image/png'>
    
   <style>
   
   
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
    
    #submitdiv {
    padding-top:10px;
    border: 1px solid black;
     margin-left: 35%;
     width:38%;
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
    padding-top:29px;
  
    }
    
    #querycarforms{
    width:300px;
    margin:0 auto;
    }
      
    #clearblock{
    clear:both;

    height: 50px; 
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
 
 <div class="formsbox">
 
 <div id="formcardiv">
<fieldset>
       <legend>Add a Car</legend> 
 <form action="add-a-car.php" method="post">
 
  <label>Manufacturer:</label>
  <input type="text" name="car_manu"><br>

  <label>Model:</label>
  <input type="text" name="car_model"><br>
  
  <label>Year of Make:</label>
  <input type="text" name="car_year" ><br>

  <label>Colour:</label>
  <input type="text" name="car_colour"><br>
  
  <label>Registration:</label>
  <input type="text" name="car_reg"><br>
  
  <label>Fuel Type:</label>
  <input type="text" name="car_fuel"><br>
  
  <label>Rate:</label>
  <input type="text" name="car_rate"><br>
  
<div class="submitdiv">
<input type="submit" name="submit_car_details" value="Add">

</div>
</form>
</fieldset>
</div>

<div id="searchid">
<fieldset>
<legend>Update a car</legend>
<form method=POST action="update-a-car-form.php">
<div>Enter ID to update:
<input type="text" name="record" size="10" maxlength="10"><br /><br />
<input type="submit" name="go" value="Go"></div></form>
 </div>
</fieldset> 
 
 
 <br>

<div id="delcar">
<fieldset>
<legend>Delete a Car</legend>
<form method="post" action="del-a-car.php">
<table width="200" border="0" cellspacing="1" cellpadding="2">
<tr><td width="100">Car ID</td>
<td><input name="carid" type="text"></td></tr>
<tr><td colspan="2">
<input name="delete" type="submit" id="delete" value="Delete"></td>
</tr></table></form>
</form>
</fieldset>
</div>
 
 </div>
 
 
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
 

 
 
 
 
 <div class="topblock"> </div>    
            <!--Index-->
  
  
  
  </div>
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
          <li><a href = '../hire-a-car-form.php'>Hire a car</a></li>
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