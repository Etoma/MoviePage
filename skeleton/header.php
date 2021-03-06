<body>
	<nav>
		<ul class="nav navbar-nav">
			<li class=<?php echo $content === 'home' ? 'active' : 'inactive' ?>><a href="./?page=home">Home</a></li>
			<li class=<?php echo $content === 'songs' ? 'active' : 'inactive' ?>><a href="./?page=songs">Songs</a></li>
			<li class=<?php echo $content === 'movies' ? 'active' : 'inactive' ?>><a href="./?page=movies">Movies</a></li>
			<li class=<?php echo $content === 'users' ? 'active' : 'inactive' ?>><a href="./?page=users">Users</a></li>
			<li id='user-selected'>
                <?php if (isset($_SESSION['user'])) {
					echo $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'];
				} else {
					echo '<li id="user-selection">';
					echo "User selection: <form method='POST'><select onchange='this.form.submit()' name='user'>";
					echo "<option value = 0>Please choose a user</option>";
						foreach($users as $user) 
						{
							echo '<option value=' . $user['userID'] . '>' . $user['firstname'] . ' ' . $user['lastname'] . '</option>';
						}
					echo "</select></form>";
				}
				?>
		</li>
		</ul>
	</nav>