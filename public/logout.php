<?php require_once("../includes/session.php");?>
<?php require_once("../includes/functions.php"); ?>

<?php 
    //v1: simple logout
    //need session_start() in session.php
    $_SESSION["admin_id"] = null;
    $_SESSION["username"] = null;
    redirect_to("login.php");
?>

<?php 
    //v2:destroy session
    //assumes nothing else needs to be kept

    // session_start();
    // $_SESSION = array();
    // if(isset($_COOKIE[session_name()])){
    //     setcookie(session_name(), '', time()-42000, '/');
    // }
    // session_destroy();
    // redirect_to("login.php");
?>