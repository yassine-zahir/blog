<?php include "includes/db.php"; ?>
<?php session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tableau de Bord Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../../index.php">Sport Magazine</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
            <?php 
									if (isset($_SESSION["connecte"])) 
									{
										// echo 'bonjour '.$_SESSION["nom_user"].' '.$_SESSION["prenom_user"];
										echo '<div class="dropdown">
										<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
										 echo '<i class="fas fa-user fa-fw"> </i>bonjour '.$_SESSION["nom_user"].' '.$_SESSION["prenom_user"];
									echo '</a>';
									  
									echo'	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
									echo'	  <a class="dropdown-item" href="../../tables.php">Mes Articles</a> <br>';
									echo '	  <a class="dropdown-item" href="ajout_article.php">Ajouter Article</a><br>';
									echo'	  <a class="dropdown-item" href="../../logout.php">Se Déconnecter</a>
										</div>
									  </div>';
										 
									}
									else {
										header('location:login.php');
										
									}

									?>
               
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Tableau de bord</a
                            >
                            
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="users.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-user "></i></div>
                                Users</a
                            ><a class="nav-link" href="articles.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-file  "></i></div>
                                Articles</a
                            >
                            <a class="nav-link" href="commentaires.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-comment "></i></div>
                                Commentaires</a
                            >
                            <a class="nav-link" href="messages.php"
                                ><div class="sb-nav-link-icon"><i class="fa fa-envelope "></i></div>
                                Messages</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo ''.$_SESSION["nom_user"].' '.$_SESSION["prenom_user"]; ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tableau de bord</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                        <div class="row">
                            
                            <div class="col-xl-3 col-md-6">
                            
                                <div class="card bg-primary text-white  text-right">
                                    
                                <i class="fa fa-file fa-5x"></i>
                                         <?php
                                            $query = "SELECT * FROM articles";
                                            $select_all_post = mysqli_query($conn, $query);
                                            $post_count = mysqli_num_rows($select_all_post);
                                            echo "<div class='huge display-4 '>{$post_count}</div>"
                                        ?>

                                    <div >Articles</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="articles.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4 text-right">
                                <i class="fa fa-user fa-5x"></i>
                                         <?php
                                            $query = "SELECT * FROM users";
                                            $select_all_post = mysqli_query($conn, $query);
                                            $post_count = mysqli_num_rows($select_all_post);
                                            echo "<div class='huge display-4 '>{$post_count}</div>"
                                        ?>
                                    <div >users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4 text-right">
                                <i class="fa fa-comments  fa-5x"></i>
                                         <?php
                                            $query = "SELECT * FROM commentaires";
                                            $select_all_post = mysqli_query($conn, $query);
                                            $post_count = mysqli_num_rows($select_all_post);
                                            echo "<div class='huge display-4 '>{$post_count}</div>"
                                        ?>
                                    <div >Commentaires</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="commentaires.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4 text-right">
                                <i class="fa fa-envelope  fa-5x"></i>
                                <?php
                                            $query = "SELECT * FROM messages";
                                            $select_all_post = mysqli_query($conn, $query);
                                            $post_count = mysqli_num_rows($select_all_post);
                                            echo "<div class='huge display-4 '>{$post_count}</div>"
                                        ?>
                                    <div >Messages</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="messages.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
