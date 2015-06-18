<main>
	<h2>Upload</h2>
	<?php
	if($mode === 'song') 
	{
		if($_POST['submit'])
		{
			move_uploaded_file($_FILES["new-song"]["tmp_name"], "music/" . $_FILES["new-song"]["name"]);
			$db->insertNewSong($_FILES['new-song']['name'], $_POST['song-title'], $_POST['song-artist'], $_POST['song-album']);
			echo 'Song was saved successfully';
			unset($_FILES);
			unset($_POST);
		}
	?>
	<form method="POST" action="" enctype="multipart/form-data">
		<label for="s-upload">Upload new song</label><input type="file" name="new-song" id="s-upload" required><br>
		<label for="s-title">Song title</label><input type="text" name="song-title" id="s-title" required><br>
		<label for="s-artist">Artist</label><input type="text" name="song-artist" id="s-artist" required><br>
		<label for="s-album">Album</label><input type="text" name="song-album" id="s-album" required><br>
		<input type="hidden" value="song" name="mode">
		<button type="submit" value="true" name="submit">Upload</button>
	</form>
	<?php
	} elseif ($mode === 'video') {
		if($_POST['submit'])
		{
			move_uploaded_file($_FILES["new-video"]["tmp_name"], "videos/" . $_FILES["new-video"]["name"]);
			$db->insertNewVideo($_FILES["new-video"]["name"], $_POST['video-title'], $_POST['video-dexcription']);
			echo 'Video was saved successfully';
			unset($_FILES);
			unset($_POST);
		} ?>
		<form method="POST" action="" enctype="multipart/form-data">
		<label>Upload new video</label><input type="file" name="new-video" required><br>
		<label>Video title</label><input type="text" name="video-title" required><br>
		<label>Description</label><textarea name="video-description" required></textarea><br>
		<input type="hidden" value="video" name="mode">
		<button type="submit" value="true" name="submit">Upload</button>
	</form>
<?php } ?>
</main>