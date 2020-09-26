<?php 
	include('config/db_connect.php');

	if (isset($_GET['id'])) {
		$id = mysqli_real_escape_string($conn, $_GET['id']);
	}

	$sql = "SELECT * FROM news WHERE id = $id";

	$result = mysqli_query($conn, $sql);

	$gamenews = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn);
 ?>

 	<?php include('templates/header.php'); ?>
 	<div class="newspage">
 		<?php if($gamenews): ?>
 			<h1 id="gametitle"><?php echo $gamenews['title'] ?></h1>
 			<h2 id="gamesubtitle"><?php echo $gamenews['subtitle'] ?></h2>
 			<p id="byinpage">Written by <b> <?php echo $gamenews['creator'] ?></b> at <?php echo date('d/m/Y, H:i', strtotime($gamenews['created_at'])); ?></p>
 			<img id="inpage" src="<?php echo $gamenews['image_link'] ?>">
 			<p id="text"><?php echo $gamenews['text'] ?></p>
 		<?php else: ?>
 			<p>Não existe nada aqui!</p>
 			<a href="#" onclick="history.back();">Voltar à página anterior</a>
 		<?php endif; ?>
 	</div>

 	<?php include('templates/footer.php') ?>