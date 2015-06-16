<main>
	<h2>Upload</h2>
	<?php 
	if($mode === 'song') 
	{ ?>
	<form method="POST">
		<input type="file" name="new-song" id="" required><br>
		<input type="text" name="song-name">
	</form>
	<?php
	} elseif ($mode === 'video') {
		echo 'upload a video';
	}
	?>
</main>