<?php
session_start();
require_once 'configbd.php';
require_once 'function.php';
if ($_POST['submit']) {
   $res = addPost(encryption($_POST['name']), encryption($_POST['description']));

    if ($res) {
      $_SESSION['res'] = $res;
      header('Location:' .$_SERVER['PHP_SELF']);
     exit();

    }else {
        $_SESSION['res'] = $error;
        $_SESSION['name'] = encryption($_POST['name']);
        header('Location:' .$_SERVER['PHP_SELF']);
        exit();
}
}
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Книга отзывов</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Книга отзывов</h1>
            <?php
           $post = SelectComent();
           foreach ($post as $value) {
               echo "<div class=\"note\">
				<p>
					<span class=\"date\">$value[date]</span>
					<span class=\"name\">$value[name]</span>
				</p>
				<p>
					 $value[description]
				</p>
			</div>";
           }
            ?>
            <?php
            echo $_SESSION['res'];
            unset($_SESSION['res']);
            ?>
			<div id="form">
				<form action="index.php" method="POST">
					<p><input class="form-control" placeholder="Ваше имя" name="name"></p>
					<p><textarea class="form-control" placeholder="Ваш отзыв" name="description"></textarea></p>
					<p><input type="submit" name="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
		</div>
	</body>
</html>

