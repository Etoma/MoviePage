<h2>Edit</h2>
<?php
if($_POST['save'] === 'song')
{
	$db->changeSong($_POST['songTitle'], $_POST['songArtist'], $_POST['songAlbum'], $_POST['songId']);
	header("Location: ./?page=songs");
	exit;

} 
elseif($_POST['save'] === 'movie') 
{
	$db->changeVideo($_POST['movieTitle'], $_POST['movieDescription'], $_POST['movieId']);
	header("Location: ./?page=movies");
	exit;
}
elseif($_POST['songId']) {
	$data = $db->getSongDataById($_POST['songId']);
	unset($data['songName']);
	unset($data['songID']);
	echo '<form method="POST">';
	echo '<input type="hidden" value="song" name="save">';
	echo '<input type="hidden" value=' . $_POST['songId'] . ' name="songId">';
}
elseif($_POST['movieId']) {
	$data = $db->getVideoDataById($_POST['movieId']);
	unset($data['movieName']);
	unset($data['movieID']);
	echo '<form method="POST">';
	echo '<input type="hidden" value="movie" name="save">';
	echo '<input type="hidden" value=' . $_POST['movieId'] . ' name="movieId">';
}
foreach ($data as $key => $entry) {
	if($key === 'movieDescription')
	{
		echo '<label for="' . $key . '">' . $key . '</label><textarea value="' . $entry . '" name="' . $key . '" id="' . $key . '">' . $entry . '</textarea><br>';
	} else {
		echo '<label for="' . $key . '">' . $key . '</label><input type="text" value="' . $entry . '" name="' . $key . '" id="' . $key . '"><br>';
	}
}
?>
<button type="submit">Send</button>
</form>
