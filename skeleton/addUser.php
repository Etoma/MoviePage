<?php
if (!empty($_POST)) {
    include('database.php');
    $db->addUser($_POST['firstname'], $_POST['lastname'], $_POST['userEmail']);
    echo 'Success';
} else {
    echo "Invalid Requests";
}