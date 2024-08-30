<?php
 session_destroy();
 unset($_SESSION['username']);
 unset($_SESSION['error']);
 header('location: index.php');
?>