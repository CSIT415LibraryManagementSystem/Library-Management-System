<?php
session_start();
session_unset();   // Remove Session Vars
session_destroy(); // Destroy Session 

header("Location: login.php"); //Redirect to Home Page (Guest View)
exit();
?>
