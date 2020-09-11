<?php include "admin/dist/includes/db.php"; ?>
<?php session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports Magazine</title>
    <!-- Goole Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,500" rel="stylesheet"> 

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
    <!-- Owl carousel -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
	 <link href="assets/css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Off Canvas Menu -->
    <link href="assets/css/offcanvas.min.css" rel="stylesheet">

    <!--Theme CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<div id="main-wrapper">

    <!-- Header Section -->
	<header>
	    <div class="container">
	     	<div class="top_ber">
				<div class="row">
		    		<div class="col-md-6">
						<div id="clock" class="top_ber_left">
							
						</div><!--top_ber_left-->
		    		</div><!--col-md-6-->
		    		<div class="col-md-6">
		    			<div class="top_ber_right">
		    				<div class="top-menu">
		    					<ul class="nav navbar-nav">  
									<?php 
									if (isset($_SESSION["connecte"])) 
									{
										// echo 'bonjour '.$_SESSION["nom_user"].' '.$_SESSION["prenom_user"];
										echo '<div class="dropdown">
										<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
										 echo 'bonjour '.$_SESSION["nom_user"].' '.$_SESSION["prenom_user"];
									echo '</a>';
									  
									echo'	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
									if($_SESSION['role_user']=='admin'){
										echo'	  <a class="dropdown-item" href="admin/dist/admin.php">Page Admin</a> <br>';
									}
									echo'	  <a class="dropdown-item" href="tables.php">Mes Articles</a> <br>';

									echo '	  <a class="dropdown-item" href="admin/dist/ajout_article.php">Ajouter Article</a><br>';
									echo'	  <a class="dropdown-item" href="logout.php">Se Déconnecter</a>
										</div>
									  </div>';
										 
									}
									else {
										echo '<li><a href="admin/dist/login.php">Login</a></li>';
										 echo '<li><a href="admin/dist/registeration.php">Register</a></li>';
									}

									?>
									

			                       
	                    		</ul>
		    				</div><!--top-menu-->
		    			</div><!--top_ber_left-->
		    		</div><!--col-md-6-->
		    	</div><!--row-->
	     	</div><!--top_ber-->
	     	
	     	<div class="header-section">
				<div class="row">
		    	 	<div class="col-md-3">
						<div class="logo">
						<a  href="index.php"><img class="img-responsive" src="assets/img/logo.png" alt=""></a>
						</div><!--logo-->
		    	 	</div><!--col-md-3-->
		    	 	
		    	 	<div class="col-md-6">
						<div class="header_ad_banner">
						<a  href="www.mdjs.ma"><img class="img-responsive" src="assets/img/02-MDJS-Banner-MOMO-V2.png" alt=""></a>
						</div>
		    	 	</div><!--col-md-6-->
		    	 	
		    	 	<div class="col-md-3">
						<div class="social_icon1">
								<a class="icons-sm fb-ic"><i class="fa fa-facebook"></i></a>
								<!--Twitter-->
								<a class="icons-sm tw-ic"><i class="fa fa-twitter"></i></a>
								<!--Google +-->
								<a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
								<!--Linkedin-->
								<a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a> 
								<!--Pinterest-->
								<a class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a>
						</div> <!--social_icon1-->
		    	 	</div><!--col-md-3-->
		    	</div> <!--row-->	
	     	</div><!--header-section-->    	      
	    </div><!-- /.container -->   

		<nav class="navbar main-menu navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				</div>
				<div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
				<ul class="nav navbar-nav">
					<li class="hidden"><a href="#page-top"></a></li>
					<li><a class="page-scroll" href="category.php?id_catg=1">FootBall</a></li>
					<li><a class="page-scroll" href="category.php?id_catg=2">BasketBall</a></li>
					<li><a class="page-scroll" href="category.php?id_catg=3">Tennis</a></li>
					
					
					

					<li class="dropdown">
						<a href="category.php?id_catg=4" class="dropdown-toggle" data-toggle="dropdown">Others <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a class="page-scroll" href="category.php?id_catg=4">Hockey</a></li>
					<li><a class="page-scroll" href="category.php?id_catg=4">Basetball</a></li>
					<li><a class="page-scroll" href="category.php?id_catg=4">Boxing</a></li>
					<li><a class="page-scroll" href="category.php?id_catg=4">Golf</a></li>
						</ul>
					</li>
				</ul>
				<div class="pull-right">
					<form class="navbar-form" role="search">
						<div class="input-group">
							<input class="form-control" placeholder="Search" name="q" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							</div>
						</div>
					</form>
				</div>
				</div>
			</div>
		</nav> 
		<!-- .navbar -->
	</header>