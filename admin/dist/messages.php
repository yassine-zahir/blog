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
                                <th>email </th>
                                <th>date </th>
                                <th>supprimer </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id </th>
                                
                                <th>Contenu </th>
                                <th>Auteur </th>
                                <th>email </th>
                                <th>date </th>
                                <th>supprimer </th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $session_id_user = $_SESSION["id_user"];

                            $sql = "SELECT * FROM messages ";
                            $select_posts_query = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($select_posts_query)) {

                                $msg_id = $row['id_msg'];
                                $msg_date = $row['date_msg'];
                                
                                $msg_contenu = $row['contenu_msg'];
                                $msg_auteur = $row['nom_auteur_msg'];
                                $msg_mail = $row['mail_auteur_msg'];
                               
                                





                            ?>
                                <tr>
                                    <td><?php echo $msg_id; ?></td>
                                    
                                    <td><?php echo $msg_contenu; ?></td>
                                    <td><?php echo $msg_auteur; ?></td>
                                    <td><?php echo $msg_mail; ?></td>
                                    <td><?php echo $msg_date; ?></td>
                                    
                                    
                                    
                                    <td><a onclick="confirm()" href='messages.php?delete=<?php echo $msg_id; ?>'>Supprimer</a></td>

                                </tr>
                            <?php
                            }

                            ?>
                            <?php
                            //delete post
                            if (isset($_GET['delete'])) {
                                $the_msg_id = $_GET['delete'];
                                $query = "DELETE FROM messages WHERE id_msg = {$the_msg_id}";
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