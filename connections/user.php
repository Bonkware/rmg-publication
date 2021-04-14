<?php
	/**
	 * Created by JetBrains PhpStorm.
	 * User: User
	 * Date: 8/27/13
	 * Time: 2:39 PM
	 * To change this template use File | Settings | File Templates.
	 */

	require_once "user_in.php";
	if(!session_id()){
		session_start();
		if(isset($_SESSION['h']) && isset($_COOKIE['h'])){
			unset($_SESSION['h']);
		}
	}
	$u_id;
	if(isset($_POST['user_logging'])){
		$email=$_POST['email'];
		$password=$_POST['pass'];
		log_in($email,$password);
	}
	else if(isset($_POST['user_first'])){
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$res= savePassword($email,$password);
		if(!$res){
			$res=setHash($email);
		}
		else{
			echo $res;
		}
	}else{
		if(!isset($_COOKIE['h']) || $_COOKIE['h']=="off"){
			session_start();
			$_SESSION['login']="You need to login, enable cookies in your browser or refresh this page in order to proceed!";

			header("location:../index.php");
		}

		$u_id=userID();
	}
?>