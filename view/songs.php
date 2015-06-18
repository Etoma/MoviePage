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
            echo $song['songArtist'] . ' - ' . $song['songTitle'];
            echo '<br>';
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
            echo '</div>';
            echo '<br>';
        }
    } else {
        echo 'No songs found';
    }

    ?>
</main>