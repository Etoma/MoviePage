<main>
    <h2>Music</h2>

    <form action="./?page=songs" method="POST">
        <input type="text" placeholder="search" name="keyword"> <span>use * as placeholder</span>
        <input type="hidden" value="search" name="mode">
    </form>
    <form action="./?page=upload" method="POST">
        <button type="submit" value="song" name="mode">upload new song</button>
    </form>
    <br>
    <?php
    $music = [];
    if ($mode === 'all') {
        $music = $db->getAllSongs();
    } elseif ($mode === 'search') {
        $music = $db->searchSongs($_POST['keyword']);
    }
    if (count($music)) {
        foreach ($music as $song) {
            echo '<div class="song">';
            echo '<div class="song-title"><a href="./?page=detail&songId=' . $song["songID"] . '">' . $song['songTitle'] . '</a>';
            if (isset($_SESSION['user'])) {
                $isFavorite = $db->isFavorite($song['songID'], 2, $_SESSION['user']['userID']);
                echo !$isFavorite ? '' : '<img src="./img/heart.png" width="20px" height="20px">';
            }
            echo '</div><br>';
            echo '<audio controls>';
            echo '<source src="./music/' . $song['songName'] . '" type="audio/mp3">';
            echo '</audio>';
            echo '</div><br>';
            echo '<div class="commands">';
            echo '<div class="edit">';
            echo '<form method="POST" action="./?page=edit">';
            echo '<button type="submit" value="' . $song["songID"] . '" name="songId">Edit</button>';
            echo '</form>';
            echo '</div>';
            echo '<div class="delete">';
            echo '<form method="POST" action="./?page=delete">';
            echo '<button type="submit" value="' . $song["songID"] . '" name="songId">Delete</button>';
            echo '</form>';
            echo '</div>';
            echo '<div class="favorite">';
            if (isset($_SESSION['user'])) {
                if (!$isFavorite) {
                    echo '<form method="POST" action="./?page=favorite">';
                    echo '<input type="hidden" name="mode" value="add">';
                    echo '<button type="submit" value="' . $song["songID"] . '" name="songId">Favorite</button>';
                    echo '</form>';
                } else {
                    echo '<form method="POST" action="./?page=favorite">';
                    echo '<input type="hidden" name="mode" value="remove">';
                    echo '<button type="submit" value="' . $song["songID"] . '" name="songId">Unfavorite</button>';
                    echo '</form>';
                }
            }
            echo '</div>';
            echo '</div>';
            echo '<br>';
        }
    } else {
        echo 'No songs found';
    }

    ?>
</main>