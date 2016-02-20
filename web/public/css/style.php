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


#participate .btn .btn-success .col-md-offset-3 .col-md-5 .col-sm-offset-3 .col-sm-5{
	background-color: @color;
}

.btn-customize {
	margin-top: 20px;
	width: 330px;
	text-transform: uppercase;
	border-radius: 0px;
	background-color: @color;
	border: 2px solid @color;
	transition: all 0.5s ease;
}

.btn-customize:hover {
	background-color: #fff;
	border: 2px solid @color;
	color: @color;
}

#footer {
	padding-top: 10px;
	padding-bottom: 10px;
	background-color: @color;
	color:#fff;
}

#footer a {
	text-decoration: none;
	color: #fff;
}

.modal-header{
	background-color: @color !important;
	color: white !important;
}

#myModal{
	margin-top: 5% !important;
}

.contributionIndex:hover {
	border: 6px solid @color;
	box-shadow: 0 0 3px #ccc;
}
