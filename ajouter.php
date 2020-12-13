<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">



	<title>Exercice romuald</title>

</head>
<body> 
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

           $select=$connexion->query("SELECT * from categories ");
           $select->execute();

           $data = $select->fetch(PDO::FETCH_OBJ);
?>	
	
	
	 

<?php

           $select=$connexion->query("SELECT id,name FROM categories order by name");
           $select->execute();

           $data = $select->fetchAll(5);
?>		
	
	
	<div class="container mt-5 xs">
	<h1 class="text-center mb-4">Ajouter un produit</h1>
    <div class="row shadow p-3 mb-5 bg-white rounded">
        <div class="col-md-12">
            <form action="" method="post">
                <div class="form-group">
                <label>Titre du produit :</label>
                <input type="text" class="form-control" name="titre"/>
            </div>
                <div class="form-group">
                <label for=>Description du produit :</label>
                <textarea class="form-control" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for=>Prix</label>
                <input  class="form-control" type="text" name="prix"/>
            </div>

            <div class="form-group">
                <label>Choix de la catégorie</label>
                <select type="select"class="form-control" name="choix">
				<?php
				foreach($data as $cat){
				?>
                    <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
				<?php
				}
				?>
                   
                </select>
            </div>
            <div class="form-group row">
                <label class="col-3 col-form-label">Date de création :</label>
                <div class="col-8">
                <input type="datetime-local"  name="datec">
            </div>
        </div>
        <div class="form-group row">
                <label class="col-3 col-form-label">Date de modification :</label>
                <div class="col-8">
                <input type="datetime-local"  name="datem">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success  btn-lg btn-block mt-5 mb-5">Valider</button>
            </form>
        </div>
    </div>
	</body>
	</html>
  
	<?php 
	if(isset($_POST['submit'])){
		
    $titre=$_POST['titre'];
	$description=$_POST['description'];
	$prix=$_POST['prix'];
	$category=$_POST['choix'];
	$datec=$_POST['datec'];
	$datem=$_POST['datem'];
	
	if($titre&&$description&&$prix){
	
    $connexion->query("INSERT INTO products VALUES(null,'$titre','$description','$prix','$category','$datec','$datem')");
	
	header('Location: products.php');
    }else{
		
		echo'Veuillez remplir tous le champs';
	}
	}
?>	