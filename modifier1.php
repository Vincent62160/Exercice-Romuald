<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<title>exercice romuald</title>
</head>
<body> 

<?php
 $serveur ="localhost";
       $login="root";
       $pass="";
       /* acceder à sa base de donnée*/
       try{
       $connexion= new PDO("mysql:host=$serveur;dbname=products;charset=utf8;", $login, $pass);
       echo 'connexion réussie';

       $connexion-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


       }
       catch(PDOException $e){
           echo 'echec de la connexion : ' .$e->getMessage();
       }



?>
<?php

           $select=$connexion->query("SELECT * FROM categories WHERE id=".$_GET['id']);
           $select->execute();

           $data = $select->fetch(PDO::FETCH_OBJ);
?>


    <div class="container mt-5">
        <h1 class="text-center mb-4">Modifier la catégorie</h1>
        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                <label>Nom de la catégorie :</label>
                <input type="text" class="form-control" name="category"value="<?php echo $data->name; ?>"/>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Date de création :</label>
                <div class="col-8">
                <input type="datetime-local"  name="datec"value="<?php echo $data->created; ?>">
            </div>
        </div>
        <div class="form-group row">
                <label class="col-3 col-form-label">Date de modification :</label>
                <div class="col-8">
                <input type="datetime-local" name="datem"value="<?php echo $data->modified; ?>">
            </div>
        </div>
            <button type="submit" name="submit" class="btn btn-success  btn-lg btn-block mt-5 mb-5">Modifier</button>
            </form>
        </div>
    </div>
</div>



    <?php
      if(isset($_POST['submit'])){

        $category=$_POST['category'];
        $datec=$_POST['datec'];
        $datem=$_POST['datem'];

         $connexion->query("UPDATE categories SET name='$category',created='$datec',modified='$datem'WHERE id=".$_GET['id']);
         header('Location: category.php');



        }
    ?>
</body>
</html>