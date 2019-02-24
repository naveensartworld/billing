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
		$prd_name = !empty($_POST['prd_name'])?$_POST['prd_name']:NULL; 
		$start_date  = !empty($_POST['start_date'])?$_POST['start_date']:NULL;
		$end_date = !empty($_POST['end_date'])?$_POST['end_date']:NULL;
		$description = !empty($_POST['description'])?$_POST['description']:NULL;
		$prd_type  = !empty($_POST['prd_type'])?$_POST['prd_type']:NULL;
		$subscription = !empty($_POST['subscription'])?$_POST['subscription']:1;
		$deleted=0;
		$active=!empty($_POST['active'])?$_POST['active']:1;
		$default_price  = !empty($_POST['default_price'])?$_POST['default_price']:NULL;
		$default_period  = !empty($_POST['default_period'])?$_POST['default_period']:NULL;
		$date = date("Y-m-d H:i:s");
		$updated_by = $_SESSION['id'];
		$doc_type = 'prod_code';
		$sequence = getHighKey($doc_type,$con);
		$query = "insert into products(prd_name,start_date,prod_code,end_date,description,prd_type,subscription,default_price,active,default_period,create_date,create_by,last_modify_date,last_modify_by,deleted) values('$prd_name','$start_date','$sequence','$end_date','$description','$prd_type','$subscription','$default_price','$active','$default_period', '$date','$updated_by','$date','$updated_by','$deleted')";
		die($query);
		$sql=mysqli_query($con,$query);
		$_SESSION['msg']="Product Inserted Successfully !!";
		header("Location:manage-product.php?insert=y");
	
	}
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product || Add Product</title>
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
                                        <h4 class="header-title">Add Product</h4>
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
                                        <form class="needs-validation" novalidate="" autocomplete="off" name="insertProduct" onSubmit="return valid();" method="post" enctype="multipart/form-data">
										
                                            <div class="form-group">
                                                <label for="pname">Product Name</label>
                                                <input type="text" name="prd_name" value="<?php if(isset($_POST['prd_name'])) echo $_POST['prd_name']; ?>" id="pname" placeholder="Enter Product Name" class="form-control" required>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">Start Date</label>
                                                <input type="date"    name="start_date" value="<?php if(isset($_POST['start_date']))  echo $_POST['start_date']; ?>"   placeholder="Enter Start Date" class="form-control" required>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="basicinput">End Date</label>
                                                <input type="date"    name="end_date" value="<?php if(isset($_POST['end_date']))  echo $_POST['end_date']; ?>"   placeholder="Enter End Date" class="form-control" required>
                                               
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="control-label" for="basicinput">Description</label>
                                                 <textarea  placeholder="Enter Description" class="form-control" required ><?php if(isset($_POST['description'])) echo $_POST['description']; ?></textarea>
												 
                                            </div>
                                             
                                              <div class="form-group">
                                                <label class="control-label" for="basicinput"> Product Type</label>
                                                <select name ="country" class="form-control" required> 
                                                	<option value="">Select Product Type</option>
                                                	<?php 
													 $sqlQuery = 'select row_id,Prd_type from producttypes where active ="1"';
													 $result = mysqli_query($con,$sqlQuery);
													 while($data = mysqli_fetch_array($result))
													{ ?>
                                                    	<option value="<?php echo $data['row_id']; ?>" 
                                                        	<?php 
															if(isset($_POST['Prd_type']))
															{
																if($data['row_id']==$_POST['Prd_type']){
																	echo 'selected="selected"';	
																}
															}
															?>
                                                       	 ><?php echo $data['Prd_type']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                
                                            </div>
											
											 <div class="form-group">
                                                <label class="control-label" for="basicinput">Subscription</label>
													<input type="radio" id="active" name="active" value="1">
													<label for="active">Yes</label>
													<input type="radio" id="inactive" name="active" value="0">
													<label for="inactive">No</label>
                                            </div>
											<div class="form-group">
                                                <label class="control-label" for="basicinput">Default Price</label>
                                                 <input type="text"    name="default_price" value="<?php if(isset($_POST['default_price'])) echo $_POST['default_price']; ?>"  placeholder="Enter Default Price" class="form-control" required>
                                            </div>
											<div class="form-group">
                                                <label class="control-label" for="basicinput">Periods</label>
                                                <select name ="country" class="form-control" required> 
                                                	<option value="">Select Periods</option>
                                                	<?php 
													 $sqlQuery = 'select row_id,period_name from periods where active ="1"';
													 $result = mysqli_query($con,$sqlQuery);
													 while($data = mysqli_fetch_array($result))
													{ ?>
                                                    	<option value="<?php echo $data['row_id']; ?>" 
                                                        	<?php 
															if(isset($_POST['period_name']))
															{
																if($data['row_id']==$_POST['period_name']){
																	echo 'selected="selected"';	
																}
															}
															?>
                                                       	 ><?php echo $data['period_name']; ?></option>
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