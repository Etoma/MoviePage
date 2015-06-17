<main>
	<h2>Music</h2>
	<form action="./?page=songs" method="POST">
		<input type="text" placeholder="search" name="keyword"> <span>use * as placeholder</span>
		<input type="hidden" value="search" name="mode">
	</form>
	<form action="./?page=upload" method="POST">
		<button type="submit" value="song" name="mode">upload new song</button>
	<form>
	<br><br>
	<?php 
	if($mode === 'all')
	{
		$music = $db->getAllSongs();
	}
	elseif ($mode === 'search') 
	{
		$music = $db->searchSongs($_POST['keyword']);
	}
	if(count($music))
	{
		foreach ($music as $song) {
		echo '<div class="song">';
		echo $song['songArtist'] . ' - ' . $song['songTitle'];
		echo '<br>';
		echo '<audio controls>';
		echo '<source src="./music/' . $song['songName'] . '" type="audio/mp3">';
		echo '</audio>';
		echo '</div>';
		echo '<div class="commands"><button type="button">Edit</button><button type="button">Delete</button></div>';
		echo '<br>';
		}
	} else {
		echo 'No songs found';
	}
	
	?>
</main>