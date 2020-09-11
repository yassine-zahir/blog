<?php include "includes/header-admin.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Commentaires</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id </th>
                                
                                <th>Contenu </th>
                                <th>Auteur </th>
                                <th>Article </th>
                                <th>date </th>
                                <th>supprimer </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id </th>
                                
                                <th>Contenu </th>
                                <th>Auteur </th>
                                <th>Article </th>
                                <th>date </th>
                                <th>supprimer </th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $session_id_user = $_SESSION["id_user"];

                            $sql = "SELECT * FROM commentaires ";
                            $select_posts_query = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($select_posts_query)) {

                                $com_id = $row['id_com'];
                                $com_date = $row['date_com'];
                                
                                $com_contenu = $row['contenu_com'];
                                $com_auteur = $row['auteur_com'];
                                $com_article = $row['article_com'];
                               
                                





                            ?>
                                <tr>
                                    <td><?php echo $com_id; ?></td>
                                    
                                    <td><?php echo $com_contenu; ?></td>
                                    <td><?php echo $com_auteur; ?></td>
                                    <td><?php echo $com_article; ?></td>
                                    <td><?php echo $com_date; ?></td>
                                    
                                    
                                    
                                    <td><a onclick="confirm()" href='commentaires.php?delete=<?php echo $com_id; ?>'>Supprimer</a></td>

                                </tr>
                            <?php
                            }

                            ?>
                            <?php
                            //delete post
                            if (isset($_GET['delete'])) {
                                $the_com_id = $_GET['delete'];
                                $query = "DELETE FROM commentaires WHERE id_com = {$the_com_id}";
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
</div>

<?php include "includes/footer-admin.php" ?>