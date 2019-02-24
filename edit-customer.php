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
		$first_name = !empty($_POST['first_name'])?$_POST['first_name']:NULL; 
		$last_name = !empty($_POST['last_name'])?$_POST['last_name']:NULL;
		$email = !empty($_POST['email'])?$_POST['email']:NULL;
		$hiddenemail = $_POST['hiddenemail'];
		$password = !empty($_POST['password'])?$_POST['password']:NULL;
		$phone = !empty($_POST['phone'])?$_POST['phone']:NULL;
		$city = !empty($_POST['city'])?$_POST['city']:NULL;
		$country = !empty($_POST['country'])?$_POST['country']:NULL;
		$active=$_POST['astatus'];
		$deleted=0;
		$date = date("Y-m-d H:i:s");
		$sqlQuery =mysqli_query($con,"select row_id from Customers where email = '".$email."'");
		$updated_by = $_SESSION['id'];
		$num=mysqli_fetch_array($sqlQuery);
		if($num>0 and $email!=$hiddenemail){
			$_SESSION['msg']="Customer with this email address already exists !!";
		}
		else
		{

			
			$sql=mysqli_query($con,"update  customers set first_name = '$first_name',last_name='$last_name',email='$email',phone = '$phone',city = '$city',country ='$country',active = '$active',last_modify_date = '$date',last_modify_by = '$updated_by' where row_id='".decrypt($_GET['id'])."'");
			
			if($password!=''){
				$password = md5($password);
				$sql=mysqli_query($con,"update  customers set password = '$password', last_modify_date = '$date',last_modify_by = '$updated_by' where row_id='".decrypt($_GET['id'])."'");
			}
			$_SESSION['msg']="Customer Updated Successfully !!";
			header("Location:manage-users.php?update=y");
		
		}
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
$query=mysqli_query($con,"select * from customers WHERE  row_id='".decrypt($_GET['id'])."'");
$row = mysqli_fetch_assoc($query)
?>
										
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" id="fname" placeholder="Enter First Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Last Name</label>
                                                <input type="text"    name="last_name" value="<?php echo $row['last_name']; ?>"   placeholder="Enter Last Name" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Email</label> 
                                                <input type="email"    name="email" value="<?php echo $row['email']; ?>"   placeholder="Enter Email" class="form-control" >	
                                                <input type="hidden"    name="hiddenemail" value="<?php echo $row['email']; ?>"   class="form-control" >	
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
                                                <label class="control-label" for="basicinput">Phone</label>
                                                 <input type="text"    name="phone" value="<?php echo $row['phone']; ?>"  placeholder="Enter Phone" class="form-control" required>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">City</label>
                                                 <input type="text"    name="city" value="<?php echo $row['city']; ?>"  placeholder="Enter City" class="form-control" required>
                                            </div>
                                              <div class="form-group">
                                                <label class="control-label" for="basicinput">Country</label>
                                                <select name ="country" class="form-control" required> 
                                                	<option value="">Select Country</option>
                                                	<?php 
													 $sqlQuery = 'select row_id,country_name from countries where active ="1"';
													 $result = mysqli_query($con,$sqlQuery);
													 while($data = mysqli_fetch_array($result))
													{ ?>
                                                    	<option value="<?php echo $data['row_id']; ?>" 
                                                        	<?php 
																if($data['row_id']==$row['country']){
																	echo 'selected="selected"';	
																}
															?>
                                                       	 ><?php echo $data['country_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
                                              <div class="form-group">
                                                <label class="control-label" for="basicinput">Status</label>
                                                
                                                 <input type="radio"  name="astatus" value="1" <?php  if($row['active']=='1') { ?> checked <?php } ?>> Active
                                                  <input type="radio"  name="astatus" value="0" <?php if($row['active']=='0') { ?>  checked <?php } ?> > Inactive
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