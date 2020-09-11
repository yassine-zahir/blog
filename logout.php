<?php session_start(); ?>
<?php
$_SESSION['connecte']=NULL;
$_SESSION['id_user']= NULL;
$_SESSION['nom_user'] = NULL;
$_SESSION['prenom_user'] = NULL;
$_SESSION['image_user'] = NULL;
$_SESSION['role_user'] = NULL;

    header("Location:index.php");
     
?>