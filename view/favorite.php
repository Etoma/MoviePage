<?php
if (isset($_POST['songId'])) {
    if ($mode === 'add') {
        $db->setFavorite($_POST['songId'], 2, $_SESSION['user']['userID']);
    } elseif ($mode === 'remove') {
        $db->removeFavorite($_POST['songId'], 2, $_SESSION['user']['userID']);
    }
    header("Location: ./?page=songs");
} elseif (isset($_POST['movieId'])) {
    if ($mode === 'add') {
        $db->setFavorite($_POST['movieId'], 1, $_SESSION['user']['userID']);
    } elseif ($mode === 'remove') {
        $db->removeFavorite($_POST['movieId'], 1, $_SESSION['user']['userID']);
    }
    header("Location: ./?page=movies");
}