<main>
    <h2>Welcome to my video and music library</h2>
    <aside id="favorites">
        <h3>Favorites</h3>
        <?php
        if (isset($_SESSION['user'])) {
            $data = $db->getFavoritesOfUser($_SESSION['user']['userID']);
            if (count($data)) {
                ?>
                <table id="favorite-table">
                    <?php
                    foreach ($data as $key => $entry) {
                        $mediaType = isset($entry['movieID']) ? 'movie' : 'song';
                        echo '<tr><td><a href="./?page=detail&' . $mediaType . 'Id=' . $entry[$mediaType . "ID"] . '">' . $entry[$mediaType . "Title"] . '</a></td></tr>';
                    }
                    ?>
                </table>
            <?php
            } else {
                echo 'you don\'t have any favorites';
            }
        } else {
            echo 'please log in to see your favorites';
        }
        ?>
    </aside>
</main>