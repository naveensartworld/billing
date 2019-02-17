<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else{
	$currentTime = date( 'd-m-Y h:i:s A', time () );
	if(isset($_POST['submit']))
	{
		$sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['password'])."' && username='".$_SESSION['alogin']."'");
		$num=mysqli_fetch_array($sql);
		if($num>0)
		{
			 $con=mysqli_query($con,"update admin set password='".md5($_POST['newpassword'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'");
			$_SESSION['msg']="Password Changed Successfully !!";
		}
		else
		{
			$_SESSION['msg']="Old Password not match !!";
		}
	}
}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Change Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("include/header.php"); ?>
    <script type="text/javascript">
	function valid()
	{
		if(document.chngpwd.password.value=="")
		{
			alert("Current Password Filed is Empty !!");
			document.chngpwd.password.focus();
			return false;
		}
		else if(document.chngpwd.newpassword.value=="")
		{
			alert("New Password Filed is Empty !!");
			document.chngpwd.newpassword.focus();
			return false;
		}
		else if(document.chngpwd.confirmpassword.value=="")
		{
			alert("Confirm Password Filed is Empty !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
		{
			alert("Password and Confirm Password Field do not match  !!");
			document.chngpwd.confirmpassword.focus();
			return false;
		}
		return true;
	}
</script>
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
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <?php include("include/sidebar.php"); ?>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            
            <!-- header area end -->
            <!-- page title area start -->
      		<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding:30px;">
                            <h4 class="page-title pull-left">Change Password</h4>
                       </div>
                    </div>
          
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
            	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Change Password</h4>
										<form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Current Password</label>
                                                <input type="password" id="exampleInputEmail1" placeholder="Enter your current Password"  name="password" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">New Password</label>
                                                <input type="password" placeholder="Enter your new Password"  id="exampleInputPassword1"  name="newpassword" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">Confirm New Password</label>
                                                <input type="password" placeholder="Enter your new Password again"  id="exampleInputPassword2"  name="confirmpassword" class="form-control" required>													
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
       	 </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright <?php echo date("Y"); ?>. All right reserved.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
</body>
<?php include_once("include/footer.php"); ?>
</html>