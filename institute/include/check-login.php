<?php 
session_start(); 
if(!isset($_SESSION['institute_id'])){
    header('location: login.php');
}
$query = $_SERVER['PHP_SELF'];
$path = pathinfo($query);
$fileName = $path['basename'];

?>