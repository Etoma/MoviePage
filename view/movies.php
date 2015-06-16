<main>
	<h2>Movies</h2>
	<form action="./?page=upload" method="POST"><button type="submit" value="video" name="mode">upload new video</button><form>
	<br><br>
	<?php 
	if($mode === 'all')
		{
			$movies = $db->getAllVideos();
		} elseif ($mode === 'search') {
			$movies = $db->searchVideos();
		}
		foreach ($movies as $video) {
				echo '<div class="video">';
				echo $video['movieTitle'];
				echo '<br>';
				echo '<video controls>';
				echo '<source src="./videos/' . $video['movieName'] . '" type="video/mp4">';
				echo '</video>';
				echo '</div>';
				echo '<div class="commands"><button type="button">Edit</button><button type="button">Delete</button></div>';
				echo '<br>';
			}
	?>
</main>