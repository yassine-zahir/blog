<?php include "includes/db.php"; ?>
 <?php session_start(); ?> 
<?php

if(isset($_GET['modifier'])){
    $the_post_id = $_GET['modifier'];
}
$sql = "SELECT * FROM articles WHERE id_article={$the_post_id}";
$select_posts_by_id = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($select_posts_by_id )){
    $post_id = $row['id_article'];
    
    $post_title = $row['nom_article'];
    $post_category_id = $row['catg_article'];
    
    $post_image = $row['image_article'];
    
    
    $post_date = $row['date_article'];
    $post_content = $row['contenu_article'];
}



//update posts 
if(isset($_POST['modifier_article'])){

    $post_title =  $_POST['nom_article'];
    $post_category = $_POST['category_article'];
    
    // var_dump($_FILES);
    
    //php catch image this way 
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

   
    $post_contenu= mysqli_real_escape_string($conn, $_POST['article_contenu']);
    //function give me actual date
    $post_date = date('Y-m-d');
    

    move_uploaded_file($post_image_temp, "images/$post_image");
   
    
   
    
    
    

    //update sql query
    $query = "UPDATE articles SET catg_article = '{$post_category}', nom_article = '{$post_title}', 
    date_article = now(), image_article = '{$post_image}' , contenu_article = '{$post_contenu}'
    WHERE id_article = {$the_post_id}";

    $update_post = mysqli_query($conn, $query);
    
    echo "<p class='bg-success'>Post Updated. <a href='../tables.php?p_id={$the_post_id}'>View Post</a> Or 
        <a href='tables.php'>Edit More Posts</a> </p>";
        header('location:../../tables.php');
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
                                    <h3 class="text-center font-weight-light my-4">Modifier votre article</h3>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">

                                        <div class="col-md-12">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">Nom
                                                    d'article</label><input class="form-control py-4"
                                                    id="inputFirstName" type="text" name="nom_article"
                                                    placeholder=""  value="<?php echo $post_title ?>"/></div>
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
                                                <option value="5">Feature</option>
                                            </select>
                                        </div>
                                        

                                        <div class=" mb-3 col-md-12">
                                        <label>Contenu d'article :</label>
                                        <textarea class="form-control" name="article_contenu" id="editor" ><?php echo $post_content; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <div><label>Image d'article : </label></div>
                                        
                                        <input type="file" name="image">
                                    </div>

                                       
                                    <div class="form-group mt-4 mb-0"><button type="submit" name="modifier_article" class="btn btn-secondary btn-lg btn-block">Modifier article</button></div>
                                    </form>
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