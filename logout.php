<?php
	session_start();
	unset($_SESSION['id']);
        unset($_SESSION['userPicture']);
        unset( $_SESSION["userName"]);
        if(isset($_SESSION["Pa_ID"]))
        {
            unset($_SESSION["Pa_ID"]);
        }
        if(isset($_SESSION["userType"]))
        {
            unset($_SESSION["userType"]);
        }
        
	header("location:login.php");
?>