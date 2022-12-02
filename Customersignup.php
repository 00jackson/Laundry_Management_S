<?php 
session_start();
include('./header.php');
include('./db_connect.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {    

//Code for Customer/Client  

$count_my_page = ("Customer.txt");
$hits = file($count_my_page); 
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$Customer= $hits[0];   
$fname=$_POST['fullname'];
$mobileno=$_POST['mobileno'];
$address=$_POST['Address'];
$emailadd=$_POST['email']; 
$password=md5($_POST['password']); 
$status=1;
$sql="INSERT INTO  tblCustomers(FullName,MobileNumber,Address,emailadd,Password,Status) VALUES(:Customer,:fname,:mobileno,:address,:emailadd,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':Address',$mobileno,PDO::PARAM_STR);
$query->bindParam(':emailadd',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your Registration successfull and you will hear from us soon")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title> Laundry Management System | Customer Signup</title>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign Up</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            appearance: none;
            margin: 0;
        }
    </style>
</head>

<body>
    <header class="h-20 bg-violet-400 flex justify-between">
        <div class="flex items-center pl-4">
            <h1 class="text-white text-3xl">Laundry Management System</h1>
        </div>
        <div class="flex items-center pr-4">
            <h2 class="text-white text-lg">About</h2>
        </div>
    </header>
    <main class="flex justify-center">
        <div class="my-10 bg-gray-200 rounded-xl">
            <form class="grid gap-6 grid-cols-1 px-4 py-2">
                <div class="flex justify-center bg-violet-500 rounded-xl">
                    <h2 class="text-white text-xl py-4 font-semibold">SignUp</h2>
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="name">Name</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="name" type="text">
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="email">Email</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="email" type="text">
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="phone">Phone No.</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="phone" type="number">
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="phone">Address</label>
                    <textarea rows="4" cols="22.8" style="resize: none;"
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="phone" type="number" placeholder=" "></textarea>
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="password">Password</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="password" type="text">
                </div>
                <div class="flex justify-center pt-4">
                    <button class="bg-gray-400 px-4 py-2 text-white rounded-full hover:bg-violet-500">Submit</button>
                </div>
                <div class="flex justify-center">
                    <p>Already have an account? <a href="login.html" class="text-blue-500 underline">login here!</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
</body>

</html>



    <!-- BOOTSTRAP CORE STYLE  -->

    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script type="text/javascript">

function valid()
{
if(document.Customersignup.password.value!= document.Customersignup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.Customersignup.confirmpassword.focus();
return false;
}
return true;

}
</script>    

</head>
<body>
    <!------MENU SECTION START-->
    <?php if($_SESSION['login'])
{
?>    

    <section class="menu-section">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars threebar" aria-hidden="true"></i>
            </button>
        </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="admin_class.php"  style="font-weight: bold;">DASHBOARD</a></li>
                            <li>
                                <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown" style="font-weight: bold;"> Account <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu dropp" role="menu" aria-labelledby="ddlmenuItem">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php" style="font-weight: bold;">My Profile</a></li>
                                     <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php" style="font-weight: bold;">Change Password</a></li>
                                </ul>
                            </li>
                            <li><a href="laundry.php" style="font-weight: bold;">Laundrylist</a></li>

                            <?php if($_SESSION['login'])
                            {
                            ?>

                            <li><a href="logout.php" class="log" style="font-weight: bold; background: #ff8e41; font-weight: bold; color: #02151f;"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbspLogout</a></li>

                            <?php }?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php } else { ?>
        <section class="menu-section">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <i class="fa fa-bars threebar" aria-hidden="true"></i>
            </button>
        </div>

            <div class="row ">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <!-- <a class="imgg"><img src="assets/img/logo.png" style="background: grey;"></a> -->
                        <ul id="menu-top" class="nav navbar-nav navbar-right">                        
                          
                             <li><a href="admin_class.php">Admin Login</a></li>
                            <li><a href="customersignup.php" class="menu-top-active" >Customer Signup</a></li>
                             <li><a href="index.php">User Login</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php } ?>
<?php
 // include('includes/header.php');
 ?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
               <div class="header-line">
      
                <p style=" background-image: url('assets/img/ag.jpg');
                    background-repeat: repeat;
                    background-clip: border box;
                    -webkit-text-fill-color: transparent;
                    /*margin-top: 200px;*/
                    font-size: 30px;
                    text-align: center;
                    font-weight: bold;
                    text-transform: uppercase;
                    font-family: 'Steelfish Rg', 'helvetica neue',
                                helvetica, arial, sans-serif;
                    font-weight: 800;
                    -webkit-font-smoothing: antialiased;" >User Signup Page</p>
                </div>
                
            </div>

        </div>

<div class="row ab">
    <div class="col-md-12">
        <div class="panell">
            <div class="panel-body">
                <form name="Customersignup" method="post" onSubmit="return valid();">

                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Enter Full Name :</label>
                      <input class="inpt" type="text" name="fullanme" autocomplete="off" required />
                    </div>

                    <div class="form-group col-md-6">
                      <label>Mobile Number :</label>
                      <input class="inpt" type="text" name="mobileno" maxlength="10" autocomplete="off" required />
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Enter Email :</label>
                      <input class="inpt" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
                      <span id="user-availability-status" style="font-size:12px;"></span>
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Enter Address:</label>
                      <input class="inpt" type="text" name="Address" id="Address" onBlur="checkAvailability()"  autocomplete="off" required  />
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Enter Password :</label>
                      <input class="inpt" type="password" name="password" autocomplete="off" required  />
                    </div>

                    <div class="form-group col-md-6">
                      <label>Confirm Password :</label>
                      <input class="inpt"  type="password" name="confirmpassword" autocomplete="off" required  />
                    </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-12">
                      <label>Verification code :</label>
                      <input type="text"  name="vercode" class="inpt" maxlength="5" autocomplete="off" required style="width: 100%; height: 45px;" />&nbsp;<img src="captcha.php">
                    </div>
                    </div>

                    <button type="submit" name="signup" class="subbtn" id="submit">Register Now </button>
                </form>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
