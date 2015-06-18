<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Movie and Audio Page</title>
	<link rel="stylesheet" type="text/css" href="./css/base.css">
	<?php if(file_exists('./css/' . $content . '.css')) {?>
	<link rel="stylesheet" type="text/css" href="./css/<?php echo $content ?>.css">
	<?php } ?>
	<script type="text/javascript" src="./js/base.js"></script>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
</head>