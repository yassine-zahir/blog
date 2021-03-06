<?php include "includes/db.php"; ?>



<?php

if (isset($_POST['submit'])) {
    
     // change les balises html en chaine de caractére strip_tags($_POST['nom']
    //  trim supprime les espaces 
    
    $nom = trim(strip_tags($_POST['nom']));
    $prenom = trim(strip_tags($_POST['prenom']));
    $email = trim(strip_tags($_POST['mail']));
    $pwd = trim(strip_tags($_POST['pwd']));
    $pwd_confirmed = trim(strip_tags($_POST['pwd_confirmed']));
    $passwd = md5($pwd);


    // The string to be escaped.

    // Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $email = mysqli_real_escape_string($conn, $email);
    $pwd = mysqli_real_escape_string($conn, $pwd);

    if (!empty($nom) && !empty($prenom) && !empty($email) && !empty($pwd)) {
        $sql = "SELECT mail_user FROM users where mail_user='$email'";
        $result = $conn->query($sql);
        
        if ($result->num_rows>0) {
            $message = "<span class='text-danger'>Ce compte existe deja</span>";
            echo $message;
           
            
        } 
        else {

            $sql = "INSERT INTO users (nom_user,prenom_user, mail_user, mp_user, role_user) VALUES('$nom','$prenom','$email','$passwd', 'user')";
            $register_user_query = mysqli_query($conn, $sql);

            if (!$register_user_query) {
                die("QUERY FAILED" . mysqli_error($conn) . ' ' . mysqli_errno($conn));
            }
            $message = "<span class='text-success'>votre Registration est creé avec succés</span>";
            echo $message;
            header("location:login.php");
        }
    }
    
else {
        $message = "<span class='text-danger'>Veuillez remplir tous les champs</span>";
        echo $message;
    }
} 
else {
    $message = "";
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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Créer Votre Compte</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputFirstName">Nom</label><input class="form-control py-4" id="inputFirstName" type="text" name="nom" placeholder="Enter votre nom" /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputLastName">Prénom</label><input class="form-control py-4" id="inputLastName" type="text" name="prenom" placeholder="Enter prenom" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" name="mail" aria-describedby="emailHelp" placeholder="Enter votre adress email email" /></div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="pwd" type="password" placeholder="Enter password" /></div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input class="form-control py-4" id="inputConfirmPassword" name="pwd_confirmed" type="password" placeholder="Confirm password" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block">Créer compte</button></div>

                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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