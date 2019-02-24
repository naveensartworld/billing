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
		$cname = !empty($_POST['cname'])?$_POST['cname']:NULL; 
		$ccode = !empty($_POST['ccode'])?$_POST['ccode']:NULL;
		$country = !empty($_POST['country'])?$_POST['country']:NULL;
		
			$sql=mysqli_query($con,"insert into currencies(currency_name,currency_code,country,active) values('$cname','$ccode','$country','1')");
			$_SESSION['msg']="Currency Inserted Successfully !!";
			header("Location:manage_currency.php?insert=y");
		
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Currencies || Add Currency</title>
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
                                        <h4 class="header-title">Add Currency</h4>
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
                                        <form class="needs-validation" novalidate="" autocomplete="off" name="insertCustomer" method="post" enctype="multipart/form-data">
										
                                            <div class="form-group">
                                                <label for="fname">Currency Name</label>
                                                <input type="text" name="cname" value="<?php echo $_POST['cname']; ?>" id="fname" placeholder="Currency Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Currency Code</label>
                                                <input type="text"    name="ccode" value="<?php echo $_POST['ccode']; ?>"   placeholder="Enter Currency Code" class="form-control" required>
                                               
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
																if($data['row_id']==$_POST['country']){
																	echo 'selected="selected"';	
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

</html>
<?php } ?>