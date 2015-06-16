<?php
//disable PHP error output
error_reporting(0);
//start session if it does not exists
if (!isset($_SESSION)){
  session_start();
}
include('skeleton/database.php');
//get the page taht will be shown
$content = $_GET["page"] ?: 'home';
//show user
if($_POST['user']) {
	$_SESSION['user'] = $db->getUserById($_POST['user']);
}

if(!$_SESSION['user']) {
	$users = $db->getAllUsers();
}
$mode = $_POST['mode'] ?: 'all';

//for testing
if($content === 'destroy')
{
	session_destroy();
}
?>