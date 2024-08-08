<?php
// Start the session
session_start();

// Destroy all sessions
session_unset();
session_destroy();

// Delete cookies by setting expiration time to past
setcookie('user-email', '', time() - 3600, '/'); 
setcookie('user_id', '', time() - 3600, '/');   

// Redirect to login page or home page
header("Location: ../View/resources/Auth/login.php");
exit();
?>
