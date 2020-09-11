<?php include "header.php"; ?>
    <body class="sb-nav-fixed">
       
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Table des articles</h1>
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nom d'article</th>
                                                <th>contenu d'article</th>
                                                <th>date d'article</th>
                                                <th>status d'article</th>
                                                <th>image d'article</th>
                                                <th>nbr like</th>
                                                <th>categorie d'article</th>
                                                <th>modifier</th>
                                                <th>supprimer</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Nom d'article</th>
                                                <th>contenu d'article</th>
                                                <th>date d'article</th>
                                                <th>status d'article</th>
                                                <th>image d'article</th>
                                                <th>nbr like</th>
                                                <th>categorie d'article</th>
                                                <th>modifier</th>
                                                <th>supprimer</th>
                                            </tr>
                                        </tfoot>
                                       

                                        <tbody>
                                        <?php
                                $session_id_user=$_SESSION["id_user"];
                                
                               
$sql = "SELECT distinct * FROM articles,users,categories where auteur_article= $session_id_user and catg_article=id_catg group by id_article";
$select_posts_query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($select_posts_query)){

$post_id = $row['id_article'];
$post_nbr_like = $row['nbr_like'];
$post_title = $row['nom_article'];
$post_author = $row['nom_user'];
$post_date = $row['date_article'];
$post_image = $row['image_article'];
$post_categorie = $row['nom_catg'];
$post_status = $row['status_article'];
$post_views = $row['views_article'];
$post_content =substr( $row['contenu_article'],0,50);





                                        ?>
                                            <tr>
                                                <td><?php echo $post_title; ?></td>
                                                <td><?php echo $post_content; ?></td>
                                                <td><?php echo $post_date; ?></td>
                                                <td><?php echo $post_status; ?></td>
                                                <td><?php echo $post_image; ?></td>
                                                <td><?php echo $post_nbr_like; ?></td>
                                                <td><?php echo $post_categorie; ?></td>
                                                <td><a href='admin/dist/modifier_article.php?modifier=<?php echo $post_id; ?>'>Modifier</a></td>
                                                <td><a onclick="confirm()" href='tables.php?delete=<?php echo $post_id; ?>'>Supprimer</a></td>
                                                
                                            </tr>
                                            <?php
}

                                            ?>
                                            <?php
        //delete post
        if(isset($_GET['delete'])){
            $the_post_id = $_GET['delete'];
            $query = "DELETE FROM articles WHERE id_article = {$the_post_id}";
            $delete_query = mysqli_query($conn, $query);
            
        }
        
        
    ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php include "footer.php"; ?>
