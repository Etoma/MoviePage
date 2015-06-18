<main>
    <h2>Movies</h2>

    <form action="./?page=movies" method="POST">
        <input type="text" placeholder="search" name="keyword"> <span>use * as placeholder</span>
        <input type="hidden" value="search" name="mode">
    </form>
    <form action="./?page=upload" method="POST">
        <button type="submit" value="video" name="mode">upload new video</button>
    </form>
    <br>
    <?php
    $movies = [];
    if ($mode === 'all') {
        $movies = $db->getAllVideos();
    } elseif ($mode === 'search') {
        $movies = $db->searchVideos($_POST['keyword']);
    }
    if (count($movies)) {
        foreach ($movies as $video) {
            echo '<div class="video">';
            echo '<a href="./?page=detail&movieId=' . $video["movieID"] . '">' . $video['movieTitle'] . '</a>';
            echo '<br>';
            echo '<video controls width="320" height="240">';
            echo '<source src="./videos/' . $video['movieName'] . '" type="video/mp4">';
            echo '</video>';
            echo '</div><br>';
            echo '<div class="commands">';
            echo '<div class="edit">';
            echo '<form method="POST" action="./?page=edit">';
            echo '<button type="submit" value="' . $video["movieID"] . '" name="movieId">Edit</button>';
            echo '</form>';
            echo '</div>';
            echo '<div class="delete">';
            echo '<form method="POST" action="./?page=delete">';
            echo '<button type="submit" value="' . $video["movieID"] . '" name="movieId">Delete</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '<br><br>';
        }
    } else {
        echo 'No movies found';
    }
    ?>
</main>