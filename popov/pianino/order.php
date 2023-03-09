<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<h1>Заказ</h1>
	<div style="width:400px;border:10px solid #7397da;border-radius:10px;-moz-border-radius:25px;margin:auto;margin-top: 50px;padding: 30px">
            <div>                
                <div id="divAF">
                  
            </div>
           
          <div style="margin-top:10px;margin-bottom:10px;">
            <h1><a href="https://codepen.io/fududk/full/OJgBGQr"></a></h1><h1><a href="https://codepen.io/fududk/full/LYrNBXG"></a></h1>
            
          </div>
           

            
        </div>
	<form>
		
		<?php if ( isset($_GET['title']) ) : ?>
			<p>Вы заказываете оборудование: <?php echo $_GET['title']; ?></p>
		<?php elseif ( isset($_SESSION['cart_list']) ) : ?>
			<ul>
				<?php foreach( $_SESSION['cart_list'] as $course ) : ?>

					<li><?php echo $course['title']; ?> | <?php echo $course['price']; ?> руб.</li>

				<?php endforeach; ?>
			</ul>

			<p>
				
				<div class="tip" style="color:red;font-size:18px;font-weight:bold;"><a href="cart.php">Изменить заказ</a><a href=""></a></div>
			</p>
		<?php endif; ?>

		
		<input type="text" placeholder="Name">
		<input type="text" placeholder="Mobile">
		<input type="submit">
	</form>
	
</body>
</html>