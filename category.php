<?php include "header.php"; ?>

	<!-- Feature Category Section & sidebar -->
	<section id="feature_category_section" class="feature_category_section category_page section_wrapper">
	<div class="container">   
		<div class="row">
		   	<div class="col-md-9">
		   		<div class="row">								 
					<div class="col-md-12">
						<div class="feature_news_item category_item">
						<?php
					$post_id_category = $_GET['id_catg'];
					if ($post_id_category==1  || $post_id_category==2 ||$post_id_category==3 || $post_id_category==4) {

$sql = "SELECT * FROM articles,users WHERE catg_article = {$post_id_category} and image_article NOT LIKE 'img-list%'  order by id_article desc  limit 1"; 
$select_posts_query = mysqli_query($conn, $sql);


while($row = mysqli_fetch_assoc($select_posts_query)){

	$post_id = $row['id_article'];
	$post_title = $row['nom_article'];
	$post_author = $row['nom_user'];
	$post_date = $row['date_article'];
	$post_image = $row['image_article'];
	$post_content = $row['contenu_article'];

}
}
?>
                			<div class="item">
								<div class="item_wrapper">
									<div class="item_img">
										<img class="img-responsive" style="width: 900px;" src="assets/img/<?php echo $post_image;?>" alt="Chania">
									</div><!--item_img--> 
									<div class="item_title_date">
										<div class="news_item_title">
											<h1><a href="article.php?id_art=<?php echo $post_id ?>"><?php echo $post_title;?></a></h1>
										</div><!--news_item_title-->
										<div class="item_meta"><a href="#"><?php echo $post_date;?></a> by:<a href="#"><?php echo $post_author;?></a></div>
									</div><!--item_title_date-->
								</div><!--item_wrapper-->
							    <div class="item_content"><?php echo $post_content;?>
							    </div><!--item_content-->

							</div><!--item-->               			 
            			</div><!--feature_news_item-->
					</div><!--col-md-6-->
				</div>		
				<div class="row">	
				<?php
					
					$sql = "SELECT distinct * FROM articles,users WHERE catg_article = {$post_id_category} and image_article NOT LIKE 'img%' group by id_article "; 
					$select_posts_query = mysqli_query($conn, $sql);
					
					
					while($row = mysqli_fetch_assoc($select_posts_query)){
						$post_id = $row['id_article'];
						$post_title = $row['nom_article'];
						$post_author = $row['nom_user'];
						$post_date = $row['date_article'];
						$post_image = $row['image_article'];
						$post_content = substr( $row['contenu_article'],0,50);
					
					
					
					?>							 
					<div class="col-md-6">
						<div class="feature_news_item">

					
							<div class="item">
								<div class="item_wrapper">
									<div class="item_img">
										<img class="img-responsive" style="height: 300px;" src="assets/img/<?php echo $post_image;?>" alt="Chania">
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
					</div><!--col-md-6-->
					<?php
									}
							?>
					 
				</div><!--row-->	
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

<?php include "footer.php"; ?>