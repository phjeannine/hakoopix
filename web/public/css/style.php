<?php 
session_start();
header("Content-type: text/css; charset: UTF-8"); 
?>

@color : <?php echo $_SESSION['color'] ?>;


.navbar {
	background-color: @color;
}

#rules .fa { 
	color : @color;
 }



.price {
	border: 10px solid @color;
}


.barre {
	border-top: 2px solid @color;

}