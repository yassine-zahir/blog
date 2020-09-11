<?php include "includes/header-admin.php"; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Users</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id </th>
                                <th>Nom </th>
                                <th>Prenom </th>
                                <th>mail </th>
                                <th>mot de passe </th>
                                <th>role </th>
                                <th>image </th>
                                <th>modifier </th>
                                <th>supprimer </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id </th>
                                <th>Nom </th>
                                <th>Prenom </th>
                                <th>mail </th>
                                <th>mot de passe </th>
                                <th>role </th>
                                <th>image </th>
                                <th>modifier </th>
                                <th>supprimer </th>

                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $session_id_user = $_SESSION["id_user"];

                            $sql = "SELECT * FROM users ";
                            $select_posts_query = mysqli_query($conn, $sql);

                            while ($row = mysqli_fetch_assoc($select_posts_query)) {

                                $post_id = $row['id_user'];
                                
                                $post_nom = $row['nom_user'];
                                $post_prenom = $row['prenom_user'];
                                $post_mail = $row['mail_user'];
                                $post_mp = $row['mp_user'];
                                $post_role = $row['role_user'];
                                $post_image = $row['image_user'];
                                





                            ?>
                                <tr>
                                    <td><?php echo $post_id; ?></td>
                                    <td><?php echo $post_nom; ?></td>
                                    <td><?php echo $post_prenom; ?></td>
                                    <td><?php echo $post_mail; ?></td>
                                    <td><?php echo $post_mp; ?></td>
                                    <td><?php echo $post_role; ?></td>
                                    <td><?php echo $post_image; ?></td>
                                    
                                    <td><a href='modifier_user.php?modifier=<?php echo $post_id; ?>'>Modifier</a></td>
                                    <td><a  href='users.php?delete=<?php echo $post_id; ?>'>Supprimer</a></td>

                                </tr>
                            <?php
                            }

                            ?>
                            <?php
                            //delete post
                            if (isset($_GET['delete'])) {
                                $the_post_id = $_GET['delete'];
                                $query = "DELETE FROM users WHERE id_user = {$the_post_id}";
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