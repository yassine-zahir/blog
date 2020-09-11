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
        <title>Tableau de bord Admin</title>
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
									echo '	  <a class="dropdown-item" href="admin/dist/ajout_article.php">Ajouter Article</a><br>';
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
                               users</a
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