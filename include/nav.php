<!DOCTYPE html>

<?php
session_start();



include_once './login/dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PhoenixEgypt Internal Portal</title>

    <!-- Fonts -->
    <link href="./css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="./css/fonts.css" rel='stylesheet' type='text/css'>
    <link href="./css/droidarabicnaskh.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
<link href="./css/bootstrap.min.css" rel="stylesheet">


    <!--- <link href="http://www.task.local/css/bootstrap.min.css" rel="stylesheet">--->


<link rel="stylesheet" href="./css/jquery-ui.css">





    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>




<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand fa fa-btn fa-home" class=" " href="./home.php">
                 PhoenixEgypt  

                </a>
            </div>



            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
               


<div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                 
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Receipts</a>
                        <ul class="dropdown-menu" role="menu">
                                <li><a href="./recepitlist.php"><i class="fa fa-btn fa-list"></i>Receipts list</a></li>
                                <li><a href="./addrecepit.php"><i class="fa fa-btn fa-plus"></i>New Receipt</a></li>
                            </ul>
</li>

 <li><a href="./customers.php">Customers</a></li>
 <li><a href="./cards.php">Sangoma Analog Cards</a></li>


</ul>




                

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->




               
                        <li class="dropdown">
                            <a href="./login/logout.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
<?php echo $userRow['username'];?>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
				<li><a href="./reset.php"><i class="fa fa-btn fa-edit"></i>Change Password</a></li>
                                <li><a href="./login/logout.php?logout"><i class="fa fa-btn fa-sign-out"></i>Logout </a></li>
                            </ul>
                        </li>
             
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
