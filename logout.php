<?php
	session_start();
	unset($_SESSION['id']);
        unset($_SESSION['userPicture']);
        unset( $_SESSION["userName"]);
	header("location:login.php");
?>