 <!DOCTYPE html>
<html lang='en'>
  <head>
    <title>AutoHire Tralee - Admin/Manage Customers</title>
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
    
    
      #searchid{
     
      width: 30%;
      margin-right: 10%;
      float: right;
      padding-bottom: 44px;
      }
      
    #delcar{
 
    width:30%;
    margin-right:10%;
    float:right;
    }
    
    #querycarforms{
    width:300px;
    margin-left:10%;
    float: left;
    height: 310px;
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

<div class="formsbox">
 
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
 

<div id="searchid">
<fieldset>
<legend>Update a Customer</legend>
<form method=POST action="update-customer.php">
<div>Enter ID to update:
<input type="text" name="record" size="10" maxlength="10"><br /><br />
<input type="submit" name="go" value="Go"></div></form>
 </div>
</fieldset> 
 
 
 <br>

<div id="delcar">
<fieldset>
<legend>Delete a Customer</legend>
<form method="post" action="del-a-customer.php">
<table width="200" border="0" cellspacing="1" cellpadding="2">
<tr><td width="100">Customer ID</td>
<td><input name="custid" type="text"></td></tr>
<tr><td colspan="2">
<input name="delete" type="submit" id="delete" value="Delete"></td>
</tr></table></form>
</form>
</fieldset>
</div>
 
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