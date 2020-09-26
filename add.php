<?php 

	include('config/db_connect.php');

	$title = $subtitle = $image_link = $text = $creator = '';
	$errors = array('title'=>'', 'subtitle'=>'', 'image_link'=>'', 'text'=>'', 'creator'=>'');

	if(isset($_POST['submit'])) {
		if(empty($_POST['title'])) {
			$errors['title'] = 'A title is required <br>';
		} else {
			$title = $_POST['title'];
		}
		if (empty($_POST['text'])) {
			$errors['text'] = 'A text is required <br>';
		} else {
			$text = $_POST['text'];
		}
		if (empty($_POST['creator'])) {
			$errors['creator'] = 'A creator name is required <br>';
		} else {
			$creator = $_POST['creator'];
		}

		if(array_filter($errors)) {
			echo 'error in form';
		} else {
			$title = mysqli_real_escape_string($conn, $_POST['title']);
			$subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
			$image_link = mysqli_real_escape_string($conn, $_POST['image_link']);
			$text = mysqli_real_escape_string($conn, $_POST['text']);
			$creator = mysqli_real_escape_string($conn, $_POST['creator']);

			$sql = "INSERT INTO news(title, subtitle, image_link, text, creator) VALUES('$title', '$subtitle', '$image_link', '$text', '$creator')";

			if(mysqli_query($conn, $sql)) {
				header('location: index.php');
			} else {
				echo 'query error:' . mysqli_error($conn);
			}
		}
	}

?>

<?php include('templates/header.php') ?>

		<div class="newsform">
			<h3>Add news:</h3>
			<form action="add.php" method="POST">
				<label>Title:</label><br>
				<input type="text" name="title" value="<?php echo $title ?>">
				<p><?php echo $errors['title']; ?></p>
				<label>Subtitle:</label><br>
				<input type="text" name="subtitle" value="<?php echo $subtitle ?>">
				<p></p>
				<label>Image link:</label><br>
				<input type="text" name="image_link" value="<?php echo $image_link ?>">
				<p></p>
				<label>Text:</label><Br>
				<textarea name="text" value="<?php echo $text ?>"></textarea>
				<p><?php echo $errors['text'] ?></p>
				<label>Created by:</label><br>
				<input type="text" name="creator" value="<?php echo $creator ?>"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
		</div>

<?php include('templates/footer.php') ?>