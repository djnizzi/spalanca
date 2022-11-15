<?php
include ("config.php");
include ("connect.php");
include ("cookie.php");
// $response = "flashid=" .$_POST["flashtime"];
if (isset($id)){
	if (!empty($id) || $id!="" || $id!=null){
$response .= "flashid=" .$id;
echo $response;
				}}
?>
