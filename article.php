<?php include "header.php"; ?>
<?php
    
	if(isset($_POST['ajouter_comment'])){
		$nom = $_POST['nom'];
		$contenu = $_POST['content'];
		$id_article = $_GET['id_art'];
		
		
		
		// The string to be escaped.

// Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
		$nom = mysqli_real_escape_string($conn, $nom);
		$contenu = mysqli_real_escape_string($conn, $contenu);
		$date = date('Y-m-d');
		


		if(!empty($nom) && !empty($contenu)){
			
			

			$sql = "INSERT INTO commentaires (contenu_com,date_com, auteur_com, article_com) VALUES('$contenu',now(),'$nom', $id_article)";
			$comment_query = mysqli_query($conn, $sql);

			if(!$comment_query){
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




	<!-- Feature Category Section & sidebar -->
	<section id="feature_category_section" class="feature_category_section single-page section_wrapper">
	<div class="container">   
		<div class="row">
		   	 <div class="col-md-9">
				<div class="single_content_layout">
					<div class="item feature_news_item">
					<?php
					$post_id_article = $_GET['id_art'];

$sql = "SELECT * FROM articles,users WHERE id_article = {$post_id_article}"; 
$select_posts_query = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($select_posts_query)){
	$post_title = $row['nom_article'];
	$post_author = $row['nom_user'];
	$post_date = $row['date_article'];
	$post_image = $row['image_article'];
	$post_content = $row['contenu_article'];

}
?>
						<div class="item_img">
							<img  class="img-responsive" style="width: 1500px;" src="assets/img/<?php echo $post_image;?>" alt="Chania">
						</div><!--item_img--> 
							<div class="item_wrapper">
								<div class="news_item_title">
									<h2><a href="#"><?php echo $post_title;?></a></h2>
								</div><!--news_item_title-->
								<div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>

                                    <span class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-full"></i>
									</span>

									<div class="single_social_icon">
										<a class="icons-sm fb-ic" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
										<!--Twitter-->
										<a class="icons-sm tw-ic" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
										<!--Google +-->
										<a class="icons-sm gplus-ic" href="#"><i class="fa fa-google-plus"></i><span>Google Plus</span></a>
										<!--Linkedin-->
										<a class="icons-sm li-ic" href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>

									</div> <!--social_icon1-->

									<div class="item_content">
									<?php echo $post_content;?>
									</div><!--item_content-->
                                   
							</div><!--item_wrapper-->	
					</div><!--feature_news_item-->
					
					<div class="single_related_news">
					 <div class="single_media_title"><h2>Related News</h2></div>
						<div class="media_wrapper">
						<?php
											$sql = "SELECT distinct `id_article`,`nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=(SELECT `catg_article` FROM articles WHERE `id_article`= $post_id_article) and image_article like 'img-list%' order by id_article desc limit 4";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				

										?>

							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
								</div><!--media-left-->
								<div class="media-body">
									<h4 class="media-heading"><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?>
									</a></h4>
									<div class="media_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									<div class="media_content"><p><?php echo $post_content;?></p>
                                    </div><!--media_content-->
								</div><!--media-body-->
							</div><!--media-->

							<?php 
									 }
									 ?>

                            
						</div><!--media_wrapper-->
					</div><!--single_related_news-->


					<div class="ad">
						<img class="img-responsive" src="assets/img/bwin.png" alt="Chania">
					</div>

					<div class="readers_comment">
						<div class="single_media_title"><h2>Related Comments</h2></div>
						<?php
							$article_id=$_GET['id_art'];
					
					$sql = "SELECT distinct * FROM commentaires WHERE article_com = {$article_id} "; 
					$select_posts_query = mysqli_query($conn, $sql);
					
					
					while($row = mysqli_fetch_assoc($select_posts_query)){
						$name = $row['auteur_com'];
						$content = $row['contenu_com'];
						
						$post_date = $row['date_com'];
						
					
					
					
					?>			
						<div class="media">
							<div class="media-left">
								<a href="#">
								<i class="fa fa-comments  fa-2x"></i>
								</a>
							</div>

							
							<div class="media-body">
								<h2 class="media-heading"><?php echo $name?></h2>
								<?php echo $content ?>


								<div class="comment_article_social">
									<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
									<a href="#"><span class="reply_ic">Reply </span></a>
								</div>
								
							</div>
							

						</div>
						<?php 
					}
					?>
						
					</div><!--readers_comment-->

					<div class="add_a_comment">
						<div class="single_media_title"><h2>Ajouter commentaire</h2></div>
						<div class="comment_form">
						
							<form action="" method="POST">
	                            <div class="form-group">
	                                <input type="text" class="form-control" id="inputName" name="nom" placeholder="Name">
	                            </div>
	                           
	                            <div class="form-group comment">
	                                <textarea class="form-control" id="inputComment" name="content" placeholder="Comment"></textarea>
	                            </div>

	                            <button type="submit" name="ajouter_comment" class="btn btn-submit red">Ajouter</button>
	                        </form>
                        </div><!--comment_form-->
					</div><!--add_a_comment-->
				   			 
				</div><!--single_content_layout-->
		   	 </div>

			<div class="col-md-3">

				<div class="tab sitebar">
					<ul class="nav nav-tabs">
						<li class="active"><a  href="#1" data-toggle="tab">Latest</a></li>
						<li><a href="#2" data-toggle="tab">Populer</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane active" id="1">
						<?php
											$sql = "SELECT `id_article`,`nom_article`,`image_article` FROM `articles` WHERE  `id_article` IN ( SELECT max(`id_article`) FROM articles  GROUP by catg_article )";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                   
                    $post_image = $row['image_article'];
					
					
				
                
                


										?>
							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object" style="width: 100px;" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
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
											$sql = "SELECT `id_article`,`nom_article`,`image_article` FROM `articles` WHERE  `id_article` IN ( SELECT max(`id_article`) FROM articles GROUP by catg_article)";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){

                    $post_id = $row['id_article'];
                    $post_title = $row['nom_article'];
                   
                    $post_image = $row['image_article'];
					
					
				
                
                


										?>
							<div class="media">
								<div class="media-left">
									<a href="#"><img class="media-object " style="width: 100px;" src="assets/img/<?php echo $post_image;?>" alt="Generic placeholder image"></a>
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

<?php include "footer.php"; ?>

