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
		$admin_user = !empty($_POST['admin_user'])?$_POST['admin_user']:NULL; 
		$admin_first_name = !empty($_POST['admin_first_name'])?$_POST['admin_first_name']:NULL; 
		$admin_last_name = !empty($_POST['admin_last_name'])?$_POST['admin_last_name']:NULL;
		$admin_email = !empty($_POST['admin_email'])?$_POST['admin_email']:NULL;
		$admin_pass = !empty($_POST['admin_pass'])?$_POST['admin_pass']:NULL;

		$active=!empty($_POST['active'])?$_POST['active']:1;
		$deleted=0;
		$date = date("Y-m-d H:i:s");
		$sqlQuery =mysqli_query($con,"select row_id from admin_users where admin_email = '".$admin_email."'");
		$usersqlQuery =mysqli_query($con,"select row_id from admin_users where  admin_user = '".$admin_user."'");
		$updated_by = $_SESSION['id'];
		$num=mysqli_fetch_array($sqlQuery);
		$usernum=mysqli_fetch_array($usersqlQuery);
		if($num>0){
			$_SESSION['msg']="Admin with this email already exists !!";
		}
		elseif($usernum>0){
			$_SESSION['msg']="Admin with this user name already exists !!";
		}
		else
		{
			$query = "insert into admin_users(admin_user,admin_first_name,admin_last_name,admin_email,admin_pass,status,create_date,create_by,last_modify_date,last_modify_by) values('$admin_user','$admin_first_name','$admin_last_name','$admin_email','$admin_pass','$active', '$date','$updated_by','$date','$updated_by')";
			// die($query);
			$sql=mysqli_query($con,$query);
			$_SESSION['msg']="Admin Inserted Successfully !!";
			header("Location:manage-admin.php?insert=y");
		}
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin || Add Admin</title>
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
            
            <!-- header area end -->
            <!-- page title area start -->
      		<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix" style="padding:30px;">
                            <h4 class="page-title pull-left">Add Admin</h4>
                       </div>
                    </div>
          
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
            	<div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Admin</h4>
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
                                        <form class="needs-validation" novalidate="" autocomplete="off" name="insertAdmin" onSubmit="return valid();" method="post" enctype="multipart/form-data">
											<div class="form-group">
                                                <label for="fname">User Name</label>
                                                <input type="text" name="admin_user" value="<?php if(isset($_POST['admin_user'])) echo $_POST['admin_user']; ?>" id="admin_user" placeholder="Enter User Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="admin_first_name" value="<?php if(isset($_POST['admin_first_name'])) echo $_POST['admin_first_name']; ?>" id="fname" placeholder="Enter First Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Last Name</label>
                                                <input type="text"    name="admin_last_name" value="<?php if(isset($_POST['admin_last_name']))echo $_POST['admin_last_name']; ?>"   placeholder="Enter Last Name" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Email</label> 
                                                <input type="email"    name="admin_email" value="<?php if(isset($_POST['admin_email']))echo $_POST['admin_email']; ?>"   placeholder="Enter Email" class="form-control" required>	
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Password</label>
                                                 <input type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;" />
							<input type="password" name="admin_pass_fake" id="admin_pass_fake" value="" style="display:none;" />
                                                <input type="password"    name="admin_pass"  placeholder="Enter Password" class="form-control" required>	
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Confirm password</label>
                                                <input type="password"    name="cadmin_pass"  placeholder="Enter password Again" onBlur="javascript:valid();" class="form-control" required>
                                                <div class="invalid-feedback" id="invalid_feedback" style="display:none;">Password and Confirm password Field do not match  !!	</div>	
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Status</label>
													<input type="radio" id="active" name="active" value="1">
													<label for="active">Active</label>
													<input type="radio" id="inactive" name="active" value="0">
													<label for="inactive">Inactive</label>
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
		
		if(document.insertAdmin.admin_pass.value!= document.insertAdmin.cadmin_pass.value)
		{
			$("#invalid_feedback").html("admin_pass and Confirm admin_pass Field do not match  !!");
			$("#invalid_feedback").show();
			$("#exampleInputadmin_pass2").attr("style","border-color: #dc3545");
			document.insertAdmin.admin_pass.focus();
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