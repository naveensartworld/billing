<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'billing');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// COMMON FUNCTIONS


function getHighKey($doc_type,$con){
	$sql=mysqli_query($con,"SELECT format,next_num,increaments FROM  sequence where doc_type='".$doc_type."'");
	$num=mysqli_fetch_array($sql);
	$nextNum = $num['next_num']+$num['increaments'];
	mysqli_query($con,"update sequence set next_num='".$nextNum."'  where doc_type='".$doc_type."'");
	$sequence = $num['format'].$nextNum;
	return $sequence;
}

?>