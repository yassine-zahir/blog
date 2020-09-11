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
					<li><a class="page-scroll" href="#football">FootBall</a></li>
					<li><a class="page-scroll" href="#basketball">BasketBall</a></li>
					<li><a class="page-scroll" href="#tenis">Tennis</a></li>
					
					
					

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Others <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a class="page-scroll" href="#others">Hockey</a></li>
					<li><a class="page-scroll" href="#others">Basetball</a></li>
					<li><a class="page-scroll" href="#others">Boxing</a></li>
					<li><a class="page-scroll" href="#others">Golf</a></li>
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

    <!-- Feature Carousel Section -->
    <section id="feature_news_section" class="feature_news_section section_wrapper">
	<div class="container">   
	    <div class="row">
	    	<div class="col-md-6">
	    		<div class="feature_news_carousel">
					<div id="featured-news-carousal" class="carousel slide" data-ride="carousel">
					    <!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">	
						<?php
											$sql = "SELECT  `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`auteur_article`,`nom_user` FROM articles,users where id_user=auteur_article   ORDER BY id_article DESC limit 1";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				
				}
                


										?>		
							<div class="item active feature_news_item">
								<div class="item_wrapper">
									
									<div class="item_img">
										<img class="img-responsive w-100" style="height: 450px" src="assets/img/<?php echo $post_image;?>" alt="Chania">
									</div> <!--item_img-->
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
										</div>
										<div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									</div> <!--item_title_date-->
								</div>	<!--item_wrapper-->
							    <div class="item_content"><?php echo $post_content;?></div>

							</div><!--feature_news_item-->
							<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`auteur_article`,`nom_user` FROM articles,users where id_user=auteur_article and NOT `image_article` LIKE 'img_fea%' ORDER BY id_article limit 4";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				
				
                


										?>

							<div class="item feature_news_item">
								<div class="item_wrapper">
									<div class="item_img">
										<img class="img-responsive w-100" style="height: 450px" src="assets/img/<?php echo $post_image;?>" alt="Chania">
									</div> <!--item_img--> 
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
										</div>
                                        <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									</div> <!--item_title_date-->
								</div> <!--item_wrapper-->	
								
								<div class="item_content"><?php echo $post_content;?>
								</div>

							</div><!--feature_news_item-->
							<?php
								}
							?>
							 

					  		<!-- Left and right controls -->
							<div class="control-wrapper">
								<a class="left carousel-control" href="#featured-news-carousal" role="button" data-slide="prev">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
								<a class="right carousel-control" href="#featured-news-carousal" role="button" data-slide="next">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</div>
						</div><!--carousel-inner-->
	    			</div><!--carousel-->
	    		</div><!--feature_news_carousel-->
	    	</div><!--col-md-6-->
	    	
	    	<div class="col-md-6">
	    		<div class="feature_news_static">
		    		<div class="row">								 
						<div class="col-md-6">
							<div class="feature_news_item">
	                			<div class="item active">
									<div class="item_wrapper">
										<?php
											$sql = "SELECT distinct `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where `image_article` LIKE 'img_fea%' ";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                
                


										?>
										<div class="item_img">
											<img class="img-responsive" src="assets/img/<?php echo $post_image;?>" alt="Chania">
										</div> <!--item_img-->
										<div class="item_title_date">
											<div class="news_item_title">
												<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
											</div>
                                            <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
										</div><!--item_title_date-->
									</div> <!--item_wrapper-->

								    <div class="item_content"><?php echo $post_content;?> 
								    </div>

								</div><!--item-->               			 
	            			</div><!--feature_news_item-->
						</div>
						
						<div class="col-md-6">
							<div class="feature_news_item">
	                			<div class="item active">
									<div class="item_wrapper">
									<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where `image_article` LIKE 'img_fea%' order by id_article desc";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                
                


										?>
										<div class="item_img">
											<img class="img-responsive" src="assets/img/<?php echo $post_image;?>" alt="Chania">
										</div> <!--item_img-->
										<div class="item_title_date">
											<div class="news_item_title">
												<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
											</div>
                                            <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
                                        </div><!--item_title_date-->
									</div> <!--item_wrapper-->
								    <div class="item_content"><?php echo $post_content;?>
								    </div>

								</div><!--item-->               			 
	            			</div><!--feature_news_item-->
						</div><!--col-xs-6-->
					</div><!--row-->
	    		</div><!--feature_news_static-->
	    	</div><!--col-md-6-->
	    </div><!--row-->
	</div><!--container-->   	
</section><!--feature_news_section-->

    <!-- Feature Category Section & sidebar -->
    <section id="feature_category_section" class="feature_category_section section_wrapper">
	<div class="container">   
		<div class="row">
		   	<div class="col-md-9">
		   		<div class="category_layout">
					   <div id="football" class="item_caregory red"><h2><a href="category.php?id_catg=1">Football</a></h2></div>
					  
						<div class="row">
				   			<div class="col-md-7">
								<div class="item feature_news_item">
									<div class="item_wrapper">
									<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=1 and NOT `image_article` LIKE 'img_fea%' order by id_article desc LIMIT 1 ";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                
                


										?>
										<div class="item_img">
											<img class="img-thumbnail w-100" src="assets/img/<?php echo $post_image;?>" alt="Chania">
										</div><!--item_img--> 
										<div class="item_title_date">
											<div class="news_item_title">
												<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
											</div><!--news_item_title-->
                                            <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
										</div><!--item_title_date-->
									</div><!--item_wrapper-->	
								    <div class="item_content"><?php echo $post_content;?>
								    </div><!--item_content-->

								</div><!--feature_news_item-->
				   			</div><!--col-md-7-->
				   			
				   			<div class="col-md-5">
								<div class="media_wrapper">
								<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`image_article` FROM articles where catg_article=1 and NOT `image_article` LIKE 'img_fea%'  limit 4";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    
                    
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
			
                
                


										?>

									<div class="media">
										<div class="media-left">
											<a href="#"><img class="media-object w-80" style=" height: 80px" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
										</div><!--media-left-->
										<div class="media-body">
											<h3 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?>
											</a></h3>

											<p><?php echo $post_content;?></p>

										</div><!--media-body-->
									</div><!--media-->

								<?php 
									 }
									 ?>

									

									
								</div><!--media_wrapper-->
								 
				   			</div><!--col-md-5-->
				   		</div><!--row-->
			   		</div><!--category_layout-->

		   		<div class="category_layout">
		   			<div  id="basketball" class="item_caregory blue"><h2><a href="category.php?id_catg=2">BasketBall</a></h2></div>
					<div class="row">
			   			<div class="col-md-7">
							<div class="item active feature_news_item">
								<div class="item_wrapper">
								<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=2 and NOT `image_article` LIKE 'img_fea%' order by id_article desc";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                
                


										?>
									<div class="item_img">
										<img class="img-responsive w-100" src="assets/img/<?php echo $post_image;?>" alt="Chania">
									</div><!--item_img-->  
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h2>
										</div><!--news_item_title-->
                                        <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									</div><!--item_title_date-->
								</div><!--item_wrapper-->	
							    <div class="item_content"><?php echo $post_content;?>
							    </div>

							</div><!--feature_news_item-->
			   			</div><!--col-md-7-->
			   			
			   			<div class="col-md-5">
							<div class="media_wrapper">
							<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`image_article` FROM articles where catg_article=2  limit 4";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    
                    
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
			
                
                


										?>
								<div class="media">
									<div class="media-left">
										<a href="#"><img class="media-object w-100" style=" height: 80px" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
									</div><!--media-left-->
									<div class="media-body">
										<h3 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?>
										</a></h3>

										<p><?php echo $post_content;?></p>

									</div><!--media-body-->
								</div><!--media-->
									<?php
										}
									?>
								
							</div><!--media_wrapper-->
			   			</div><!--col-md-5-->
			   		</div><!--row-->
		   		</div><!--category_layout-->

		   		<div class="category_layout">
		   			<div id="tenis" class="item_caregory teal"><h2><a href="category.php?id_catg=3">Tennis</a></h2></div>
					<div class="row">
			   			<div class="col-md-7">
							<div class="item active feature_news_item">
								<div class="item_wrapper">
								<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=3 order by id_article DESC ";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){
				   
					$post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                
                


										?>
									<div class="item_img">
										<img class="img-responsive w-100" src="assets/img/<?php echo $post_image;?>" alt="Chania">
									</div><!--item_img-->  
									<div class="item_title_date">
										<div class="news_item_title">
											<h2><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h3>
										</div><!--news_item_title-->
                                        <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									</div><!--item_title_date-->
								</div><!--item_wrapper-->	
							    <div class="item_content"><?php echo $post_content;?>
							    </div>

							</div><!--feature_news_item-->
			   			</div><!--col-md-7-->
			   			
			   			<div class="col-md-5">
							<div class="media_wrapper">
							<?php
											$sql = "SELECT `id_article`,`nom_article`,`contenu_article`,`image_article` FROM articles where catg_article=3  limit 4";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    
                    
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
			
                
                


										?>
								<div class="media">
									<div class="media-left">
										<a href="#"><img class="media-object w-100" style=" height: 80px" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
									</div><!--media-left-->
									<div class="media-body">
										<h3 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?>
										</a></h3>

										<p><?php echo $post_content;?></p>

									</div><!--media-body-->
								</div><!--media-->

								<?php 
									}
								?>

								

								
							</div><!--media_wrapper-->
			   			</div><!--col-md-5-->
			   		</div><!--row-->
		   		</div><!--category_layout-->
		   		
		   		<div id="more_news_item" class="more_news_item">
					<div id="others" class="more_news_heading"><h2><a href="category.php?id_catg=4">Other News</a></h2></div>
					<div class="row">
					<?php
											$sql = "SELECT  `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=4 and NOT `image_article` LIKE 'img_fea%'   limit 3";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				
                
                


										?>
						<div class="col-md-4">
							<div class="feature_news_item">
	                			<div class="item">
									<div class="item_wrapper">
										<div class="item_img">
											<img class="img-responsive w-100" style="height: 200px;" src="assets/img/<?php echo $post_image;?>" alt="Chania">
										</div><!--item_img--> 
										<div class="item_title_date">
											<div class="news_item_title">
												<h3><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h3>
											</div><!--news_item_title-->
                                            <div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
										</div><!--item_title_date-->
									</div><!--item_wrapper-->
								    <div class="item_content"><?php echo $post_content;?> 
								    </div><!--item_content-->

								</div><!--item-->               			 
	            			</div><!--feature_news_item-->
						</div><!--col-xs-4-->
							<?php
				}
				?>


						
					</div><!--row-->	
				</div><!--more_news_item-->	
		   	</div><!--col-md-9-->

		   	<div class="col-md-3">

				<div class="tab sitebar">
					<ul class="nav nav-tabs">
						<li class="active"><a  href="#1" data-toggle="tab">Latest</a></li>
						<li><a href="#2" data-toggle="tab">Populer</a></li>
					</ul>
					
					<div class="tab-content">
						<div class="tab-pane active" id="1">
						<?php
											$sql = "SELECT `id_article`,`nom_article`,`image_article` FROM `articles` WHERE  `id_article` IN ( SELECT max(`id_article`) FROM articles GROUP by catg_article )";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                   
                    $post_image = $row['image_article'];
					
					
				
                
                


										?>
							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object " style="width: 80px" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
								</div><!--media-left-->
								<div class="media-body">
									<h4 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h4>
									<span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
								</div><!--media-body-->
							</div><!--media-->

							<?php
								}
							?>

							
						</div><!--tab-pane-->

						<div class="tab-pane" id="2">
						<?php
											$sql = "SELECT `id_article`,`nom_article`,`image_article` FROM `articles` WHERE  `id_article` IN ( SELECT max(`id_article`) FROM articles WHERE image_article like 'img-list%' GROUP by catg_article)";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                   
                    $post_image = $row['image_article'];
					
					
				
                
                


										?>
							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
								</div><!--media-left-->
								<div class="media-body">
									<h3 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h3>
									<span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>
								</div><!--media-body-->
							</div><!--media-->
							<?php
								}
							?>

							
						</div><!--tab-pane-->
					</div><!--tab-content-->
				</div><!--tab-->

				
				
				<div class="ad">
					<img class="img-responsive" src="assets/img/radio_mars.png" alt="img" />
				</div>

				<div class="ad">
					<img class="img-responsive" src="assets/img/img-ad2.jpg" alt="img" />
				</div>

                <div class="most_comment">
                    <div class="sidebar_title">
                        <h2>Cantctez Nous :</h2>
                    </div>
                    <div class="media">
					<?php
    
	if(isset($_POST['ajouter_message'])){
		$nom = $_POST['nom'];
		$message = $_POST['message'];
		$email = $_POST['mail'];

		
		
		
		
		// The string to be escaped.

// Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
		$nom = mysqli_real_escape_string($conn, $nom);
		$message = mysqli_real_escape_string($conn, $message);
		$email = mysqli_real_escape_string($conn, $email);
		$date = date('Y-m-d');
		


		if(!empty($nom) && !empty($message)){
			
			

			$sql = "INSERT INTO messages (nom_auteur_msg, mail_auteur_msg,contenu_msg ,date_msg) VALUES('$nom', '$email','$message',now())";
			$msg_query = mysqli_query($conn, $sql);

			if(!$msg_query){
				die("QUERY FAILED" . mysqli_error($conn) . ' ' .mysqli_errno($conn));
			}
			$message = "";
			echo $message;

		}else{
			$message = "<span class='text-danger'>Veuillez remplir tous les champs</span>";
			echo $message;

		}

		
		
	}
	else{
		$message ="";
	}
	
?>
					<form action="" method="POST">
	                            <div class="form-group">
	                                <input type="text" class="form-control" id="inputName" name="nom" placeholder="Name">
								</div>
								<div class="form-group">
	                                <input type="email" class="form-control" id="inputmail" name="mail" placeholder="email">
	                            </div>
	                           
	                            <div class="form-group comment">
	                                <textarea class="form-control" id="inputComment" name="message" placeholder="Message"></textarea>
	                            </div>

	                            <button type="submit" name="ajouter_message" class="btn btn-submit red">Envoyer</button>
	                        </form>
                        
                    </div><!--media-->
                   
                </div><!--most_comment-->
			</div>
		</div>	   	
</section><!--feature_category_section-->

    <!-- Feature Video Item -->
    <section id="feature_video_item" class="feature_video_item section_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="feature_video_wrapper">
					<div class="feature_video_title"><h2>Featured Videos</h2></div>

					<div id="feature_video_slider" class="owl-carousel">
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/1rMlAIBVRGE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Messi is the best Player in the world</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/NQHFVAKNNqU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Maroc 2 - 2 Esapgne 2018</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
						
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/-I66rE9WylQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Wydad Champion d'afrique 2017</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
						
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/IvJY5REnJ6Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Kobe Bryant's Career</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/uhxZvM4CFBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Crazy Classicooo</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
						<div class="item">
							<div class="video_thumb"><iframe width="350" height="200" src="https://www.youtube.com/embed/GkuDViOUcG8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
							<div class="video_info">
								<div class="video_item_title"><h3><a href="#">Sharapova vs Celina Gomez Final 2004</a></h3></div><!--video_item_title-->
								<div class="item_meta"><a href="#">20mars- 2020</a></div><!--item_meta-->
							</div><!--video_info-->
						</div>
		            </div><!--feature_video_slider-->


		        </div><!--col-xs-12-->
	        </div><!--row-->
        </div><!--feature_video_wrapper-->
	</div><!--container-->
</section>

    <!-- Footer Section -->
    <footer class="footer_section section_wrapper section_wrapper" >
	<div class="footer_top_section">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="text_widget footer_widget">
					<div class="footer_widget_title"><h2>About Sports Mag</h2></div>
		         
		         	<div class="footer_widget_content">Sport Magazine Is a blog of different category of sport that give you a lot of news for each category...
					</div>
					</div><!--text_widget-->
				</div><!--col-xs-3-->

				<div class="col-md-6">
					<div class="footer_widget">
                        <div class="footer_widget_title"><h2>Discover</h2></div>
					    <div class="footer_menu_item ">
						<div class="row">
							<div class="col-sm-4"> 
								<ul class="nav navbar-nav ">
									<li><a href="../navbar/">Baseketball</a></li>
									<li><a href="../navbar-static-top/">Football</a></li>
									<li><a href="./">Cricket</a></li>
									<li><a href="../navbar/">Rugbi</a></li>
									<li><a href="../navbar/">Hockey</a></li>
									<li><a href="../navbar-static-top/">Boxing</a></li>
									<li><a href="./">Golf</a></li>
									<li><a href="../navbar/">Tennis</a></li>
									<li><a href="../navbar/">Horse Racing</a></li>
								</ul>
						    </div><!--col-sm-4-->
					        <div class="col-sm-4 "> 					  						
								<ul class="nav navbar-nav  ">
									<li><a href="../navbar/">Track & Field</a></li>
									<li><a href="../navbar-static-top/">MembershipContact us</a></li>
									<li><a href="./">Newsletter Alerts</a></li>
									<li><a href="../navbar/">Podcast</a></li>
									<li><a href="../navbar/">Blog</a></li>
									<li><a href="../navbar-static-top/">SMS Subscription</a></li>
									<li><a href="./">Advertisement Policy</a></li>
									<li><a href="../navbar/">Jobs</a></li>
								</ul>
					        </div><!--col-sm-4-->
					        <div class="col-sm-4"> 
								<ul class="nav navbar-nav ">
									<li><a href="../navbar/">Report technical issue</a></li>
									<li><a href="../navbar-static-top/">Complaints & Corrections</a></li>
									<li><a href="./">Terms & Conditions</a></li>
									<li><a href="../navbar-static-top/">Privacy Policy</a></li>
									<li><a href="./">Cookie Policy</a></li>
									<li><a href="../navbar/">Securedrop</a></li>
									<li><a href="../navbar/">Archives</a></li>
								</ul>
					        </div><!--col-sm-4-->
				      	</div><!--row-->
			      	</div><!--footer_menu_item-->
                    </div><!--footer_widget-->
				</div><!--col-xs-6-->

				<div class="col-md-3">
 					<div class="text_widget footer_widget">
						<div class="footer_widget_title"><h2>Editor’s Message</h2></div>
						<img src="assets/img/yass_z.jpg" />
						<div class="footer_widget_content">i have to thanks everybody helped me to create this blog and i hope you will enjoy website thank you</div>
					</div>
				</div><!--col-xs-3-->
			</div><!--row-->
		</div><!--container-->
	</div><!--footer_top_section-->
	<a href="#" class="crunchify-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	
	<div class="copyright-section">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
							Editor: ZAHIR Yassine
					</div><!--col-xs-3-->
					<div class="col-md-6">
						<div class="copyright">
						© Copyright 2020 - SportsMagazine.com. Design by: <a href="#" >Yassine ZAHIR</a>
						</div>
					</div><!--col-xs-6-->
					<div class="col-md-3">
						Sports News Magazine
					</div><!--col-xs-3-->
				</div><!--row-->
			</div><!--container-->
		</div><!--copyright-section-->
</footer>

</div> <!--main-wrapper-->
  
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/jquery.min.js"></script>

<!-- Owl carousel -->
<script src="assets/js/owl.carousel.js"></script>

<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- Time -->
<script src="assets/js/time.js"></script>

<!-- Theme Script File-->
<script src="assets/js/script.js"></script> 

<!-- Off Canvas Menu -->
<script src="assets/js/offcanvas.min.js"></script> 


   
</body>
</html>