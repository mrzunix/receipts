<?php

session_start();

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
                <a class="navbar-brand" href="#">
                 PhoenixEgypt   
                </a>
            </div>




    </nav>



<?php

include_once './login/dbconnect.php';
if(isset($_POST['btn-login']))
{

	$username = mysql_real_escape_string($_POST['username']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM users WHERE username='$username'");
	$row=mysql_fetch_array($res);
	
	if($row['password']==md5($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('Invalid Username Or Password');</script>
        <?php
	}
	
}
?>



<div style="margin-top:5%" class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST"  name="login-form" >
                        

                        <div class="form-group">
                            <label class="col-md-4 control-label">UserName</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username"  placeholder="Your Username">

                      
                            </div>
                        </div>
              


                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="pass" placeholder="Your Password">

                        
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" name="btn-login">
                                    <i class="fa fa-btn fa-sign-in"></i>Login 
                                </button>



                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('include/footer.php');

?>
