<?php include "includes/db.php"; ?>
 <?php session_start(); ?> 
<?php

echo $_SESSION['id_user'];

    if(isset($_POST['ajouter_article'])){
        $post_title =  $_POST['nom_article'];
        $post_category = $_POST['category_article'];
        $post_author = $_SESSION['id_user'];
        // var_dump($_FILES);
        
        //php catch image this way 
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];

       
        $post_contenu= mysqli_real_escape_string($conn, $_POST['article_contenu']);
        //function give me actual date
        $post_date = date('Y-m-d');
        

        move_uploaded_file($post_image_temp, "../../assets/img/$post_image");

       
        echo $post_category;
        $sql = "INSERT INTO articles(nom_article, contenu_article, date_article, status_article, views_article, image_article, 
         auteur_article,nbr_like,catg_article) VALUES('{$post_title}','{$post_contenu}', now(),'encours',0, '{$post_image}', '{$post_author}',
        0,'{$post_category}')";

        // $create_post_query = mysqli_query($conn, $sql);

        // confirmQuery($create_post_query);

        // $the_post_id = mysqli_insert_id($connection);
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("location: ../../index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        

        // echo "<p class='bg-success'>Post created. <a href='../post.php?p_id={$the_post_id}>View Post</a> Or 
        // <a href='posts.php'>Edit More Posts</a> </p>";
        
        
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
    <title>Ajout Article</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
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
                                    <h3 class="text-center font-weight-light my-4">Ajouter votre article</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Nom
                                                    d'article</label><input class="form-control py-4"
                                                    id="inputFirstName" type="text" name="nom_article"
                                                    placeholder="Enter le nom d'article" /></div>
                                        </div>
                                        <div class="input-group mb-3 col-md-12">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"
                                                    for="inputGroupGategory">Gategory</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupGategory" name="category_article">
                                                <option selected>Choose...</option>
                                                <option value="1">FootBall</option>
                                                <option value="2">BasketBall</option>
                                                <option value="3">Tenis</option>
                                                <option value="4">Others</option>
                                               
                                            </select>
                                        </div>
                                        

                                        <div class=" mb-3 col-md-12">
                                        <label>Contenu d'article :</label>
                                        <textarea class="form-control" name="article_contenu" id="editor"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div><label>Image d'article : </label></div>
                                        
                                        <input type="file" name="image">
                                    </div>

                                       
                                    <div class="form-group mt-4 mb-0">
                                    <button type="submit" name="ajouter_article" class="btn btn-secondary btn-lg btn-block">Ajouter article</button>
                                    </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                        <div class="small"><a href="../../index.php">La page d'acceuil</a></div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>