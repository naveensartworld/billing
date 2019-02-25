<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'billing');
include_once('Encryption.php');
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

function dateFormat($date_format,$dateFlag=0){
	if($dateFlag==1)
		return date('Y-m-d',strtotime($date_format));
	else
		return date('d-M-Y H:i A',strtotime($date_format));
}



function encrypt($sData){
$id=(double)$sData*525325.24;
return base64_encode($id);
}

function decrypt($sData){
$url_id=base64_decode($sData);
$id=(double)$url_id/525325.24;
return $id;
}
?>