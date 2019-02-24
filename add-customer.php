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
		$password = !empty($_POST['password'])?$_POST['password']:NULL;
		$phone = !empty($_POST['phone'])?$_POST['phone']:NULL;
		$city = !empty($_POST['city'])?$_POST['city']:NULL;
		$country = !empty($_POST['country'])?$_POST['country']:NULL;
		$active=!empty($_POST['active'])?$_POST['active']:1;
		$deleted=0;
		$date = date("Y-m-d H:i:s");
		$sqlQuery =mysqli_query($con,"select row_id from Customers where email = '".$email."'");
		$updated_by = $_SESSION['id'];
		$num=mysqli_fetch_array($sqlQuery);
		if($num>0){
			$_SESSION['msg']="Customer with this email address already exists !!";
		}
		else
		{
			$password = md5($password);
			$doc_type = 'cust_code';
			$sequence = getHighKey($doc_type,$con);
			$sql=mysqli_query($con,"insert into Customers(first_name,last_name,cus_code,email,password,phone,city,country,active,create_date,create_by,last_modify_date,last_modify_by,deleted) values('$first_name','$last_name','$sequence','$email','$password','$phone','$city','$country','$active', '$date','$updated_by','$date','$updated_by','$deleted')");
			$_SESSION['msg']="Customer Inserted Successfully !!";
			header("Location:manage-users.php?insert=y");
		}
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Customers || Add Customer</title>
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
                                        <h4 class="header-title">Add Customer</h4>
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
										
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" id="fname" placeholder="Enter First Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Last Name</label>
                                                <input type="text"    name="last_name" value="<?php if(isset($_POST['last_name']))  echo $_POST['last_name']; ?>"   placeholder="Enter Last Name" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Email</label> 
                                                <input type="email"    name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"   placeholder="Enter Email" class="form-control" required>	
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Password</label>
                                                 <input type="text" name="prevent_autofill" id="prevent_autofill" value="" style="display:none;" />
							<input type="password" name="password_fake" id="password_fake" value="" style="display:none;" />
                                                <input type="Password"    name="password"  placeholder="Enter Password" class="form-control" required>	
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Confirm Password</label>
                                                <input type="Password"    name="cpassword"  placeholder="Enter Password Again" onBlur="javascript:valid();" class="form-control" required>
                                                <div class="invalid-feedback" id="invalid_feedback" style="display:none;">Password and Confirm Password Field do not match  !!	</div>	
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Phone</label>
                                                 <input type="text"    name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"  placeholder="Enter Phone" class="form-control" required>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">City</label>
                                                 <input type="text"    name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>"  placeholder="Enter City" class="form-control" required>
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
															if(isset($_POST['country']))
															{
																if($data['row_id']==$_POST['country']){
																	echo 'selected="selected"';	
																}
															}
															?>
                                                       	 ><?php echo $data['country_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                
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
		
		if(document.insertCustomer.password.value!= document.insertCustomer.cpassword.value)
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