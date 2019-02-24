<?php
session_start();

include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else{
	
	if(isset($_POST['submit']))
	{
		$first_name = !empty($_POST['admin_first_name'])?$_POST['admin_first_name']:NULL; 
		$last_name = !empty($_POST['admin_last_name'])?$_POST['admin_last_name']:NULL;
		//$email = !empty($_POST['admin_email'])?$_POST['admin_email']:NULL;
		//$hiddenemail = $_POST['hiddenemail'];
		$password = !empty($_POST['admin_pass'])?$_POST['admin_pass']:NULL;
		$active=$_POST['status'];
		$date = date("Y-m-d H:i:s");
		//$sqlQuery =mysqli_query($con,"select row_id from admin_users where admin_email = '".$email."'");
		$updated_by = $_SESSION['id'];
		//$num=mysqli_fetch_array($sqlQuery);
		//if($num>0 and $email!=$hiddenemail){
		//	$_SESSION['msg']="Admin with this email address already exists !!";
		//}
		//else
		//{

			$query = "update  admin_users set admin_first_name = '$first_name',admin_last_name='$last_name',status = '$active',last_modify_date = '$date',last_modify_by = '$updated_by' where row_id='".decrypt($_GET['id'])."'";
			// die($query);
			$sql=mysqli_query($con,$query);
			
			if($password!=''){
				$password = md5($password);
				$sql=mysqli_query($con,"update admin_users set password = '$password', last_modify_date = '$date',last_modify_by = '$updated_by' where row_id='".decrypt($_GET['id'])."'");
			}
			$_SESSION['msg']="Admin Updated Successfully !!";
			header("Location:manage-admin.php?update=y");
		
		//}
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Customers || Update Customer</title>
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
            
    	
            <!-- page title area end -->
            <div class="main-content-inner">
            	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Update Customer</h4>
                                        <?php if(isset($_SESSION['msg']) and $_SESSION['msg']!='') { ?>
                                        <div class="alert alert-danger" role="alert" style="margin::0 0 10px 0;">
                                               <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']="");?>
                                         </div>
                                        <?php } ?>
                                        <?php if(isset($_SESSION['smsg']) and $_SESSION['smsg']!='') { ?>
                                     	 <div class="alert alert-success" role="alert"  style="margin::0 0 10px 0;">
                                               <?php echo htmlentities($_SESSION['smsg']); ?><?php echo htmlentities($_SESSION['smsg']="");?>
                                         </div>
                                        <?php } ?>
                                        <form class="needs-validation" novalidate="" autocomplete="off" name="insertCustomer" onSubmit="return valid();" method="post" enctype="multipart/form-data">
                                        <?php
$query=mysqli_query($con,"select * from admin_users WHERE  row_id='".decrypt($_GET['id'])."'");
$row = mysqli_fetch_assoc($query)
?>
											<div class="form-group">
                                                <label for="fname">User Name</label>
                                                <input disabled='disabled' type="text" name="admin_user" value="<?php echo $row['admin_user']; ?>" id="fname" placeholder="Admin User" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="admin_first_name" value="<?php echo $row['admin_first_name']; ?>" id="fname" placeholder="Enter First Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Last Name</label>
                                                <input type="text"    name="admin_last_name" value="<?php echo $row['admin_last_name']; ?>"   placeholder="Enter Last Name" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Email</label> 
                                                <input type="email" disabled='disabled'   name="admin_email" value="<?php echo $row['admin_email']; ?>"   placeholder="Enter Email" class="form-control" >	
                                                <input type="hidden"    name="hiddenemail" value="<?php echo $row['admin_email']; ?>"   class="form-control" >	
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Password</label>
                                                 <input type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;" />
							<input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />
                                                <input type="Password"    name="password"  placeholder="Enter Password" class="form-control" >	
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Confirm Password</label>
                                                <input type="Password"    name="cpassword"  placeholder="Enter Password Again" onBlur="javascript:valid();" class="form-control" >
                                                <div class="invalid-feedback" id="invalid_feedback" style="display:none;">Password and Confirm Password Field do not match  !!	</div>	
                                            </div>
                                           
                                              <div class="form-group">
                                                <label class="control-label" for="basicinput">Status</label>
                                                
                                                 <input type="radio"  name="status" value="1" <?php  if($row['status']=='1') { ?> checked <?php } ?>> Active
                                                  <input type="radio"  name="status" value="0" <?php if($row['status']=='0') { ?>  checked <?php } ?> > Inactive
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
  <script type="text/javascript">
	function valid()
	{
		
		if(document.insertCustomer.password.value!= document.insertCustomer.cpassword.value && document.insertCustomer.password.value!='')
		{
			$("#invalid_feedback").html("Password and Confirm Password Field do not match  !!");
			$("#invalid_feedback").show();
			$("#exampleInputPassword2").attr("style","border-color: #dc3545");
			document.insertCustomer.password.focus();
			return false;
		}
		else{
			$("#invalid_feedback").hide();
		}
		return true;
	}
</script>
</html>
<?php } ?>