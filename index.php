<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Movie and Audio Page</title>
</head>
<body>
	<nav>
		<div class="container">
			<ul class="nav navbar-nav">
				<li class="active"><a href="index.phtml">Home</a></li>
				<li class="active"><a href="index.phtml">Songs</a></li>
				<li class="active"><a href="index.phtml">Movies</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		//ToDo replace with variable for current content
		<?php require("../view/index.pthml") ?>
		<hr>
		<footer>
			<p>footer</p>
		</footer>
	</div>
</body>
</html>