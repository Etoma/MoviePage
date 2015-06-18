<?php
if($_POST['songId']) {
	echo $db->getSongNameById($_POST['songId']);
}
if($_POST['movieId']) {
	echo $db->getVideoNameById($_POST['movieId']);
}