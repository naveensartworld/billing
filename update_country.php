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
		$country_name = !empty($_POST['country_name'])?$_POST['country_name']:NULL; 
		$country_code = !empty($_POST['country_code'])?$_POST['country_code']:NULL;
		$astatus = $_POST['astatus'];

			
			$sql=mysqli_query($con,"update countries set country_code = '$country_code',country_name='$country_name',active = '$astatus' where row_id='".decrypt($_GET['id'])."'");
			
			
			$_SESSION['msg']="Countries Updated Successfully !!";
			header("Location:manage_countries.php?update=y");
		
		
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Update Country</title>
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
                                        <h4 class="header-title">Update Country</h4>
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
$query=mysqli_query($con,"select * from countries WHERE  row_id='".decrypt($_GET['id'])."'");
$row = mysqli_fetch_assoc($query)
?>
										
                                            <div class="form-group">
                                                <label for="fname">Country Code</label>
                                                <input type="text" name="country_code" value="<?php echo $row['country_code']; ?>" id="fname"  class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Country Name</label>
                                                <input type="text"    name="country_name" value="<?php echo $row['country_name']; ?>"   class="form-control" required>
                                               
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

</html>
<?php } ?>