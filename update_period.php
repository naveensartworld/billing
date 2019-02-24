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
		$pname = !empty($_POST['pname'])?$_POST['pname']:NULL; 
		$description = !empty($_POST['description'])?$_POST['description']:NULL;
		$days = !empty($_POST['days'])?$_POST['days']:NULL;
		$astatus = $_POST['astatus'];

			
			$sql=mysqli_query($con,"update periods set period_name = '$pname',description='$description',days='$days' ,active = '$astatus' where row_id='".decrypt($_GET['id'])."'");
			
			
			$_SESSION['msg']="Period Updated Successfully !!";
			header("Location:manage_periods.php?update=y");
		
		
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Update Period</title>
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
                                        <h4 class="header-title">Update Period</h4>
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
$query=mysqli_query($con,"select * from periods WHERE  row_id='".decrypt($_GET['id'])."'");
$row = mysqli_fetch_assoc($query)
?>
										
                                            <div class="form-group">
                                                <label for="fname">Period</label>
                                                <input type="text" name="pname" value="<?php echo $row['period_name']; ?>" id="fname" placeholder="Period Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Description</label>
                                                <input type="text"    name="description" value="<?php echo $row['description']; ?>"   placeholder="Enter Description" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Days</label> 
                                                <input type="number"    name="days" value="<?php echo $row['days']; ?>"  placeholder="Enter Days" class="form-control" required>	
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