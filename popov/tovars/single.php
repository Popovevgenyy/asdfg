<?php 
session_start();

if (isset($_SESSION['cart_list'])) {
	echo "Корзина: " . count($_SESSION['cart_list']) . " товаров";
}

require_once "db.php";

if ( isset($_GET['id']) ) {
	$query = "SELECT * FROM courses WHERE id=" . $_GET['id'];

	$req = mysqli_query($connection, $query);
	$current_course = mysqli_fetch_assoc($req);
	// var_dump($current_course);

	if (empty($current_course)) {
		header("Location: 404.php");
	}
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div style="width:400px;border:10px solid #7397da;border-radius:10px;-moz-border-radius:25px;margin:auto;margin-top: 50px;padding: 30px">
            <div>                
                <div id="divAF">
                  
            </div>
           
          <div style="margin-top:10px;margin-bottom:10px;">
            <h1><a href="https://codepen.io/fududk/full/OJgBGQr"></a></h1><h1><a href="https://codepen.io/fududk/full/LYrNBXG"></a></h1>
            
          </div>
           

            
        </div>
	<a href="../index.html">Главная</a>

	<h1>
		<?php echo $current_course['title']?>
	</h1>

	<p>
		<?php echo $current_course['decsription']?>
	</p>

	<p><strong>
		<?php echo $current_course['price']?> рублей
	</strong></p>
	<div class="tip" style="color:red;font-size:18px;font-weight:bold;"><a href="order.php?title=<?php echo $current_course['title']?>">Купить в 1 клик</a>
	<br>
	<div class="tip" style="color:red;font-size:18px;font-weight:bold;"><a href="cart.php?course_id=<?php echo $current_course['id']?>">Добавить в корзину</a>

	
</body>
</html>