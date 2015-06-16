<?php 
error_reporting(0);
if (!isset($_SESSION)){
  session_start();
}
$content = $_GET["page"] ?: 'home';
$_SESSION['user'] = $_POST['user'] ?: $_SESSION['user'];
$user = $_SESSION['user'] ?: 0;
$mode = $_GET['mode'] ?: 'all';
if(!$user) {
	$mysqli = new mysqli("localhost", "root", "", "movieandaudio");
	$result = $mysqli->query("SELECT * FROM users");
	$users = array();
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    $result->free();
    $mysqli->close();
}