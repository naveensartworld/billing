<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	
$ret=mysqli_query($con,"SELECT * FROM admin_users WHERE admin_user='$username' and admin_pass='$password'");
$num=mysqli_fetch_array($ret);
// echo "<pre>";print_r($num);exit;
if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}

}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Billing System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("include/header.php"); ?>
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
               <form class="needs-validation" method="post" autocomplete="off">
                    <div class="login-form-head">
                        <h4>Sign In</h4>
                    </div>
                    <div class="login-form-body">
                    	<?php if(isset($_SESSION['errmsg']) and $_SESSION['errmsg']!='') { ?>
                    	<div class="alert alert-danger" role="alert" style="margin::0 0 10px 0;">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?>
                         </div>
                        <?php } ?>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input class="form-control" required="true" type="text" id="inputEmail" autocomplete="off" name="username" placeholder="">
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;" />
							<input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />

                            <input class="form-control" required="true" type="password" id="inputPassword" autocomplete="new-password" name="password" placeholder="">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                <!--    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                --></div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                   <div class="submit-btn-area">
                   <button type="submit" class="btn btn-primary pull-right" name="submit">Login  <i class="ti-arrow-right"></i></button>
                                                
                        </div>
                        <div class="form-footer text-center mt-5">
                         <!--   <p class="text-muted">Don't have an account? <a href="register.html">Sign up</a></p> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include_once("include/footer.php"); ?>
</html>