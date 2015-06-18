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
            echo '<div class="movie-title"><a href="./?page=detail&movieId=' . $video["movieID"] . '">' . $video['movieTitle'] . '</a>';
            if (isset($_SESSION['user'])) {
                $isFavorite = $db->isFavorite($video['movieID'], 1, $_SESSION['user']['userID']);
                echo !$isFavorite ? '' : '<img src="./img/heart.png" width="20px" height="20px">';
            }
            echo '</div><br>';
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
            echo '<div class="favorite">';
            if (isset($_SESSION['user'])) {
                if (!$isFavorite) {
                    echo '<form method="POST" action="./?page=favorite">';
                    echo '<input type="hidden" name="mode" value="add">';
                    echo '<button type="submit" value="' . $video["movieID"] . '" name="movieId">Favorite</button>';
                    echo '</form>';
                } else {
                    echo '<form method="POST" action="./?page=favorite">';
                    echo '<input type="hidden" name="mode" value="remove">';
                    echo '<button type="submit" value="' . $video["movieID"] . '" name="movieId">Unfavorite</button>';
                    echo '</form>';
                }
            }
            echo '</div>';
            echo '</div>';
            echo '<br><br>';
        }
    } else {
        echo 'No movies found';
    }
    ?>
</main>