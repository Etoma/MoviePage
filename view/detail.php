<?php
$data = $db->getVideoDataById($_GET['movieId']);
?>
<?php
foreach($data as $entry)
{
	echo '<div>' . $entry . '</div>';
}
?>