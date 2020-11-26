

<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<title>Document</title>
</head>
<body> 

<?php
  session_start();
?>

<?php
 $serveur ="localhost";
       $login="root";
       $pass="";
       /* acceder à sa base de donnée*/
       try{
       $connexion= new PDO("mysql:host=$serveur;dbname=products;charset=utf8;", $login, $pass);
     

       $connexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


       }
       catch(PDOException $e){
           echo 'echec de la connexion : ' .$e->getMessage();
       }



?>
<?php

           $select=$connexion->query("SELECT * FROM products WHERE id=".$_GET['id']);
           $select->execute();

           $data = $select->fetch(PDO::FETCH_OBJ);
?>
       

        <div class="container mt-5">
            <h1 class="text-center mb-4">Modifier un produit</h1>
                <div class="row shadow p-3 mb-5 bg-white rounded">
                <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                <label>Titre du produit :</label>
                <input value="<?php echo $data->name; ?>" class="form-control" type="text" name="titre"/>
            </div>
                <div class="form-group">
                <label for=>Description du produit :</label>
                <textarea class="form-control" name="description"><?php echo $data->description; ?></textarea>
            </div>

            <div class="form-group">
                <label for=>Prix</label>
                <input value="<?php echo $data->price; ?>" class="form-control" type="text" name="prix"/>
            </div>
                <button type="submit" name="submit" class="btn btn-success  btn-lg btn-block">Modifier</button>
            </form>
        </div>
    </div>
</div>






    <?php
        if(isset($_POST['submit'])){

        $titre=$_POST['titre'];
        $description=$_POST['description'];
        $prix=$_POST['prix'];

         $connexion->query("UPDATE products SET name='$titre',description='$description',price='$prix'WHERE id=".$_GET['id']);
         header('Location: products.php');



        }
    ?>
</body>
</html>