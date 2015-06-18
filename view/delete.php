<?php
if($_POST['songId']) {
	$name = $db->getSongNameById($_POST['songId']);
	unlink('music/' . $name);
	$db->deleteSongById($_POST['songId']);
	header("Location: ./?page=songs");
}
if($_POST['movieId']) {
	$name = $db->getVideoNameById($_POST['movieId']);
	unlink('videos/' . $name);
	$db->deleteVideoById($_POST['movieId']);
	header("Location: ./?page=movies");
}