<?php include "includes/db.php"; ?>
<?php session_start(); ?>

<?php
    if(isset($_POST['login'])){ 
        
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $pwd=md5($password);
    
    

    $sql = "SELECT * FROM users WHERE mail_user = '$email' and mp_user = '$pwd' ";

    $select_user_query = mysqli_query($conn, $sql);

    if(!$select_user_query){
        die("QUERY FAILED" . mysqli_error($conn));
    }

    //loop through users id
    if ($select_user_query->num_rows > 0){

    while($row = mysqli_fetch_array($select_user_query)){
        $db_user_id = $row['id_user'];
        $db_user_nom = $row['nom_user'];
        $db_user_prenom = $row['prenom_user'];
        $db_user_mail = $row['mail_user'];
        $db_user_mp = $row['mp_user'];
        $db_user_role = $row['role_user'];

        $db_user_image = $row['image_user'];
    }
    
}
else {
    echo 'votre base de donnée est vide';
}

    // $password = crypt($password, $db_user_mp);

    //compare input login with database

    if($email === $db_user_mail && $pwd === $db_user_mp)
    {   
        $_SESSION['connecte']='oui';
        $_SESSION['id_user']= $db_user_id;
        $_SESSION['nom_user'] = $db_user_nom;
        $_SESSION['prenom_user'] = $db_user_prenom;
        $_SESSION['image_user'] = $db_user_image;
        $_SESSION['role_user'] = $db_user_role;

        if($db_user_role == 'admin')
        {

        header("Location:admin.php");
    }
    else{
        header("Location: ../../index.php");
    }
    }
    else {
        header("Location:login.php");

        echo '<p>'.'mot de pass ou email incoerrect'.'</p>';
    
    }

    
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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" type="email" name="email" placeholder="Enter email address" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" type="password" name="pwd" placeholder="Enter password" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Forgot Password?</a> <button type="submit" name='login' class="btn btn-primary">login</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="registeration.php">Need an account? Sign up!</a></div>
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
                            <div class="text-muted">Copyright &copy; Sport Magazine 2020</div>
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
