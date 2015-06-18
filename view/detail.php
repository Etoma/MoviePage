<main>
<?php
if (isset($_GET['movieId'])) {
    $data = $db->getVideoDataById($_GET['movieId']);
    ?>
    <table id="detail-table">
        <?php
        foreach ($data as $key => $entry) {
            echo '<tr><td>' . str_replace('movie', '', $key) . '</td><td>' . $entry . '</td></tr>';
        }
        ?>
    </table>
    <video controls autoplay width="90%">
        <source src="./videos/<?php echo $data['movieName'] ?>" type="video/mp4">
    </video>
<?php
} elseif (isset($_GET['songId'])) {
    $data = $db->getSongDataById($_GET['songId']);
?>
    <table id="detail-table">
        <?php
        foreach ($data as $key => $entry) {
            echo '<tr><td>' . str_replace('song', '', $key) . '</td><td>' . $entry . '</td></tr>';
        }
        ?>
    </table>
    <audio controls autoplay>
        <source src="./music/<?php echo $data['songName'] ?>" type="audio/mp3">
    </audio>
<?php
}
?>
</main>