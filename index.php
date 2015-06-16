<?php $content = $_GET["page"] ?: 'home' ?>
<?php include('skeleton/head.php'); ?>
	<div class="container">
		<?php include('view/' . $content . '.php'); ?>
	</div>
<?php include('skeleton/footer.php'); ?>