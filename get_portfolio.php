<?php require_once('config.php');?>
<?php require_once('functions.php');?>
<?php 
 header('Content-Type: application/json');
 echo json_encode($_SESSION['portfolio']);
 exit;
?>