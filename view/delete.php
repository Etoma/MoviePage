<?php
if ($_POST['songId']) {
    $data = $db->getSongDataById($_POST['songId']);
    unlink('music/' . $data['songName']);
    $db->deleteSongById($_POST['songId']);
    header("Location: ./?page=songs");
}
if ($_POST['movieId']) {
    $data = $db->getVideoDataById($_POST['movieId']);
    unlink('videos/' . $data['movieName']);
    $db->deleteVideoById($_POST['movieId']);
    header("Location: ./?page=movies");
}