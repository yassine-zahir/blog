<?php include "includes/db.php"; ?>
 <?php session_start(); ?> 
<?php

if(isset($_GET['modifier'])){
    $the_post_id = $_GET['modifier'];
}
$sql = "SELECT * FROM users WHERE id_user={$the_post_id}";
$select_posts_by_id = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($select_posts_by_id )){
    $post_id = $row['id_user'];
    
    $post_nom = $row['nom_user'];
    $post_prenom = $row['prenom_user'];
    
    $post_image = $row['image_user'];
    $post_role = $row['role_user'];
    
    
    $post_mail = $row['mail_user'];
    $post_mp = $row['mp_user'];
}



//update posts 
if(isset($_POST['modifier_user'])){

    $nom = trim(strip_tags($_POST['nom']));
    $prenom = trim(strip_tags($_POST['prenom']));
    $email = trim(strip_tags($_POST['mail']));
    $pwd = trim(strip_tags($_POST['pwd']));
   
    $passwd = md5($pwd);
    $role=$_POST['role'];
    // Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $email = mysqli_real_escape_string($conn, $email);
    $passwd = mysqli_real_escape_string($conn, $passwd);
    $role = mysqli_real_escape_string($conn, $role);

    
    
   
    
    
    

    //update sql query
    $query = "UPDATE users SET nom_user = '{$nom}', prenom_user = '{$prenom}', 
     mail_user = '{$email}' , mp_user = '{$passwd}',role_user = '{$role}'
    WHERE id_user = {$the_post_id}";

    $update_post = mysqli_query($conn, $query);
    
    
        header('location:users.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Créer Votre Compte</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputFirstName">Nom</label><input class="form-control py-4" id="inputFirstName" type="text" name="nom" value="<?php echo $post_nom; ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputLastName">Prénom</label><input class="form-control py-4" id="inputLastName" type="text" name="prenom" value="<?php echo $post_prenom; ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" name="mail" aria-describedby="emailHelp" value="<?php echo $post_mail; ?>" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="pwd" type="password" value="<?php echo $post_mp; ?>" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="role">Role</label><input class="form-control py-4" id="role" name="role" type="text" value="<?php echo $post_role; ?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button type="submit" name="modifier_user" class="btn btn-secondary btn-lg btn-block">modifier compte</button></div>
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="admin.php">Page d'administration</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sport magazine 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
