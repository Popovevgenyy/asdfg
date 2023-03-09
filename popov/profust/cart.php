<?php
session_start();


require_once "db.php";
require_once "functions.php";


if ( isset($_GET['delete_id']) && isset($_SESSION['cart_list']) ) {
	foreach ($_SESSION['cart_list'] as $key => $value) {
		if ( $value['id'] == $_GET['delete_id'] ) {
			unset($_SESSION['cart_list'][$key]);
		}		
	}
}


if ( isset($_GET['course_id']) && !empty($_GET['course_id']) ) {

	$current_added_course = get_course_by_id($_GET['course_id']);

	// ...
	if ( !empty($current_added_course) ) {

		if ( !isset($_SESSION['cart_list'])) {
			$_SESSION['cart_list'][] = $current_added_course;
		}


		$course_check = false;

		if ( isset($_SESSION['cart_list']) ) {
			foreach ($_SESSION['cart_list'] as $value) {
				if ( $value['id'] == $current_added_course['id'] ) {
					$course_check = true;
				}
			}
		}


		if ( !$course_check ) {
			$_SESSION['cart_list'][] = $current_added_course;
		}

	} else {
		header("Location: 404.php");
	}
	
}

// var_dump($_SESSION);




?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<a href="../index.html">На главную</a>

	<h1>Корзина</h1>

	<div style="width:400px;border:10px solid #7397da;border-radius:10px;-moz-border-radius:25px;margin:auto;margin-top: 50px;padding: 30px">
            <div>                
                <div id="divAF">
                  
            </div>
           
          <div style="margin-top:10px;margin-bottom:10px;">
            <h1><a href="https://codepen.io/fududk/full/OJgBGQr"></a></h1><h1><a href="https://codepen.io/fududk/full/LYrNBXG"></a></h1>
            
          </div>
           

            
        </div>


	<?php if ( isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) !=0 ) : ?>
	
		<ul>
			<?php foreach( $_SESSION['cart_list'] as $course ) : ?>

				<li>
					<?php echo $course['title']; ?> | 
					<?php echo $course['price']; ?> руб. | 
					<a href="cart.php?delete_id=<?php echo $course['id'];?>">Х</a>
				</li>

			<?php endforeach; ?>
		</ul>
		<div class="tip" style="color:red;font-size:18px;font-weight:bold;"><a href="index.php">Продолжить покупки</a><a href=""></a></div>
		<div class="tip" style="color:red;font-size:18px;font-weight:bold;"><a href="order.php">Оформить заказ</a><a href=""></a></div>
		
	<?php else : ?>

		<p>
			Ваша корзина пуста
		</p>

	<?php endif; ?>


	
	<br>

	
</body>
</html>