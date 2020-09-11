<?php include "admin/dist/includes/db.php"; ?>

<?php
											$sql = "SELECT `nom_article`,`contenu_article`,`date_article`,`image_article`,`nom_user` FROM articles,users where catg_article=2 order by id_article desc limit 1";
											$select_posts_query = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($select_posts_query)){
                   
                    $post_title = $row['nom_article'];
                    $post_author = $row['nom_user'];
                    $post_date = $row['date_article'];
                    $post_image = $row['image_article'];
					$post_content =substr( $row['contenu_article'],0,50);
					
				}
                echo $post_title;
                echo $post_author;
                echo $post_content;
                echo $post_date;
                echo $post_image;
                   


										?>