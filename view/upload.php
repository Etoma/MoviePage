<main>
	<h2>Upload</h2>
	<?php 
	if($mode === 'song') 
	{ 
		if($_POST['submit'])
		{
			$db->insertNewSong($_POST['new-song'], $_POST['song-title'], $_POST['song-artist'], $_POST['song-album']);
		}
	?>
	<form method="POST" action=".">
		<label>Upload new song</label><input type="file" name="new-song" required><br>
		<label>Song title</label><input type="text" name="song-title" required><br>
		<label>Artist</label><input type="text" name="song-artist" required><br>
		<label>Album</label><input type="text" name="song-album" required><br>
		<button type="submit">Upload</button>
	</form>
	<?php
	} elseif ($mode === 'video') {
		if($_POST['submit'])
		{
			$db->insertNewVideo($_POST['new-video'], $_POST['video-title'], $_POST['video-artist'], $_POST['video-album']);
		} ?>
		<form method="POST" action=".">
		<label>Upload new video</label><input type="file" name="new-video" required><br>
		<label>Video title</label><input type="text" name="video-title" required><br>
		<label>Description</label><textarea name="video-description" required></textarea>
		<button type="submit">Upload</button>
	</form>
<?php } ?>
</main>