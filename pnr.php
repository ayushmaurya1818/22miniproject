<html>
	<head>
		<title>
			Account Login
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 60px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
	<img class="logo" src="images/lg.png" > 
		<h1 id="title">
			United Airlines	</h1>
		<div>
			<ul>
				<li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
				<li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Book Tickets</a></li>
				<li><a href="aboutus.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
				<li><a href="contact-view.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
			</ul>
		</div>
        </body>
        </html>
<?php
session_start();

$con=mysqli_connect("localhost","root","","airline_reservation");
if(!isset($con))
{
    die("Database Not Found");
}


if(isset($_REQUEST["u_sub"]))
{
    
 $id=$_POST['pnr'];

 if($id!='')
 {
   $query=mysqli_query($con ,"select * from passengers where pnr='".$id."'");
   $res=mysqli_fetch_row($query);
   $query0=mysqli_query($con ,"select * from ticket_details where pnr='".$id."'");
   $res0=mysqli_fetch_row($query0);
   $query1=mysqli_query($con ,"select * from payment_details where pnr='".$id."'");
   $res1=mysqli_fetch_row($query1);

   if($res)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheck.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }
if($res0)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheck.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }


   
   if($res1)
   {
    $_SESSION['user']=$id;
    header('location:pnrcheck.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }
  }
 else
 {
     echo '<script>';
    echo 'alert("Enter both username and password")';
    echo '</script>';
 
 }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/login.css"></link>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
         <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
       <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>

       
        <title></title>
        
        
        
    </head>
    <body  style="background-image:url('./images/inbg.jpg');" >
        <form id="index" action="pnr.php" method="post">
            
            <div class="container-fluid">    
                <div class="row">
                  <div class="col-sm-12">
                        
                  </div>
                 </div>    
             
        
            
            
                <div  id="divtop">
                    <center>
                        <br> <br><br>
                            <div id="dmain"  > 
                               <center><img src="./images/lg.png" width="180px" height="150px" ></center>
                                <br>
                                    <input type="text" id="u_id" name="pnr" class="form-control" style="width:300px; margin-left: 66px;" placeholder="Enter Your PNR Number"><br>
                                   
                                    <input type="submit" id="u_sub" name="u_sub" value="Print" class="toggle btn btn-primary" style="width:100px; margin-left: 70px;">
                                    <button type="button" onclick="location.href = './customer_homepage.php';" class="toggle btn btn-primary" style="width:100px; margin-left: 70px;">Back to Portal</button>
                                    <br>
                                   
                             </div>
                     </div>
                    </div>
               </div>
            </div>  
            </div>
        </form>  
       </body>
</html>
