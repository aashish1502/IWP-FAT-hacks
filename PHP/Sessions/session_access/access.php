<?php
session_start();
$user_check=md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
if(empty($_SESSION['user_data']))
{
	session_regenerate_id();
	echo "NEW SESSION,SAVING user_check.";
	$_SESSION['user_data'] = $user_check;
}
if(strcmp($_SESSION['user_data'],$user_check)!==0)
{
	session_regenerate_id();
	echo "WARNNIG, you must re-enter your session";
	$_SERVER=array();
	$_SESSION['user_data']=$user_check;
}
else
{
	echo "connection verified";
}
?>

