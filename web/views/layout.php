<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hakoopix | Concours Photo Facebook en ligne</title>

    <!-- CSS Stylesheets -->
    <!-- Bootstrap Core CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/3-col-portfolio.css" rel="stylesheet">

    <!-- General Stylesheets -->
    <link href="../public/css/main.css" rel="stylesheet">
    <link href="../public/css/home.css" rel="stylesheet">

</head>
<body cz-shortcut-listen="true">
  <div class="site-wrapper">
    <div class="site-wrapper-inner">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>

		    <?php include $this->view; ?>
   	      
        <div id="footer">
          <div class="inner"></div>
        </div>

    </div><!-- /.site-wrapper-inner -->
  </div><!-- /.site-wrapper -->
  
</body>
</html>