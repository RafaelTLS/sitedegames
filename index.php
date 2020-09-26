<?php
include('config/db_connect.php');

	$sql = 'SELECT title, subtitle, image_link, text, creator, created_at, id FROM news ORDER BY id DESC';

	$result = mysqli_query($conn, $sql);

	$gamenews = mysqli_fetch_all($result, MYSQLI_ASSOC);

	mysqli_free_result($result);

	mysqli_close($conn);
?>

	<?php include('templates/header.php'); ?>

	<div class="middle">
		<?php foreach ($gamenews as $gamenew): ?>
			<ul>
				<li>
					<a href="details.php?id=<?php echo $gamenew['id'] ?>">
						<img href="details.php?id=<?php echo $gamenew['id'] ?>" src="<?php echo $gamenew['image_link']; ?>">
						<div class="headline">
							<a id="gametitle" href="details.php?id=<?php echo $gamenew['id'] ?>"><?php echo $gamenew['title']; ?></a>
							<br><p id="by">Escrito por <b><?php echo $gamenew['creator']; ?></b> em <?php echo date('d/m/Y, H:i', strtotime($gamenew['created_at'])); ?></p>
						</div>
					</a>
				</li>
			</ul>
		<?php endforeach; ?>
	</div>

	<?php include('templates/footer.php'); ?>