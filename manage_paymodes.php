<?php
session_start();

include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else{
 if(isset($_GET['del']))
  {
	  //	echo 'test';exit;
	//  echo "update customers set deleted = 1 where row_id = '".$_GET['id']."'";exit;
		  mysqli_query($con,"update customers set deleted = 1 where row_id = '".decrypt($_GET['id'])."'");
		  $_SESSION['msg']="Customer deleted successfully!!";
  }

	
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manage Paymodes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_once("include/header.php"); ?>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
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
           
            <!-- page title area end -->
            <div class="main-content-inner">
            	   <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="header-title">Manage Paymodes</h2>
                                	<?php if(isset($_SESSION['msg']) and $_SESSION['msg']!='') { ?>
                                    <div class="alert alert-success" role="success" style="margin::0 0 10px 0;">
                                           <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg']="");?>
                                     </div>
                                    <?php } ?>
                                    <?php if(isset($_GET['insert']) and $_GET['insert']!='') { ?>
                                    <div class="alert alert-success" role="success" style="margin::0 0 10px 0;">
                                           Records inserted successfully.
                                     </div>
                                    <?php } ?>
                                      <?php if(isset($_GET['update']) and $_GET['update']!='') { ?>
                                    <div class="alert alert-success" role="success" style="margin::0 0 10px 0;">
                                           Records updated successfully.
                                     </div>
                                    <?php } ?>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                            	<th>#</th>
                                                <th>PayMode</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $query=mysqli_query($con,"select * from paymodes order by row_id desc");
$cnt=1;
while($row = mysqli_fetch_array($query))
{
?>	
                                            <tr>
                                                <td><?php echo htmlentities($row['row_id']);?></td>
                                                <td><?php echo htmlentities($row['PayMode']);?></td>
                                                <td><?php  if($row['Active']=='1') { echo 'Active'; }  else { echo 'Inactive'; } ?></td>
                                                <td><a href="update_paymodes.php?id=<?php echo encrypt($row['row_id']); ?>">Edit</a></td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
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
     </div>
</body>
<?php include_once("include/footer.php"); ?>
    <!-- Start datatable js -->
    
  <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    
    <script src="assets/js/scripts.js"></script>
  <script type="text/javascript">
  	$(document).ready(function(){
      if ($('#dataTable3').length) {
        $('#dataTable3').DataTable({
            responsive: true, 
			"order": [[ 0, "desc" ]]
        });
    }
	 });
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