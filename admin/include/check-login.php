<?php 
session_start(); 
if(!isset($_SESSION['user_id'])){
    header('location: login.php');
}
$query = $_SERVER['PHP_SELF'];
$path = pathinfo($query);
$fileName = $path['basename'];
?>