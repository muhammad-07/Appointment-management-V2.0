<?php 
include('sess.php');include 'config.php';
$mid=$_REQUEST['member_id'];
isset($_REQUEST['r_type']);
if($_REQUEST['r_types']=="active") {
	$is_active=0;
} else {
    $is_active=1;
}

$q="update country set status='".$is_active."' where cid=".$mid;
mysql_query($q);
//$output=$q;
$output=array("status"=> "ok", "message" => "Change status successfully.");

echo json_encode($output);

die;