<?php
include('skeleton/definitions.php');
echo '<div id="content">';
include('skeleton/head.php');
include('view/' . $content . '.php');
include('skeleton/footer.php');
echo '</div>';
?>