<?php

	include("../connect.php");

	session_start();
	if (isset($_GET)) {
		if (isset($_GET['reset_me'])) {
			$em = mysql_real_escape_string($_GET['reset_me']);
			mysql_query("UPDATE user SET status='2' WHERE email='$em'");
			if (!mysql_error()) {
				$_SESSION['login'] = "Contact Admin to reset your account now!";
			} else {
				$_SESSION['login'] = mysql_error();
			}
			header("location:../index.php");
		}
		if (isset($_GET['reset_user'])) {
			$em = mysql_real_escape_string($_GET['reset_user']);
			mysql_query("UPDATE user SET password='', status='0' WHERE id='$em'");
			if (!mysql_error()) {
				$_SESSION['success'] = "User successfully Reset! Contact user to login again!";
			} else {
				$_SESSION['error'] = mysql_error();
			}
			header("location:../adduser.php");
		}
		if (isset($_GET['delete_user'])) {
			$em = mysql_real_escape_string($_GET['delete_user']);
			mysql_query("DELETE FROM user WHERE id='$em'");
			if (!mysql_error()) {
				$_SESSION['success'] = "User successfully Deleted!";
			} else {
				$_SESSION['error'] = mysql_error();
			}
			header("location:../adduser.php");
		}
	} elseif(isset($_POST["surname"])) {
		$designation = mysql_real_escape_string($_POST["designation"]);
		$surname     = mysql_real_escape_string($_POST["surname"]);
		$othernames  = mysql_real_escape_string($_POST["other_names"]);
		$phone       = mysql_real_escape_string($_POST["phone"]);
		$email       = mysql_real_escape_string($_POST["email"]);
		$department  = mysql_real_escape_string($_POST["department"]);
		$cat         = mysql_real_escape_string($_POST["category"]);

		mysql_query("INSERT INTO user (designation,surname,othernames,phone,email,department,category,status)
			VALUES ('$designation','$surname','$othernames','$phone','$email','$department','$cat','0')");

		if (!mysql_error()) {
			$_SESSION['success'] = "User successfully Saved!";
		} else {
			$_SESSION['error'] = mysql_error();
		}
		header("location:../adduser.php");
	}