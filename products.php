
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<<<<<<< HEAD
	<title>product</title>
=======

</head>
<body> 
<div class="container mt-4 xs">


	<table class="table table-hover">
		<thead class="thead-dark">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nom</th>
			<th scope="col">Price</th>
			<th scope="col">Category</th>
			<th scope="col">Actions</th>
			<th>
			    <a href="ajouter.php">
					<button class="btn btn-success" type="submit"><i class="material-icons" style="font-size:15px">+</i> Ajouter</button>
				</a>
			</th>
			<th>
			    <a href="category.php">
                     <button class="btn btn-success" type="submit"><i class="fab fa-buffer"></i> Category</button>
                </a>
			</th>
		    
		</tr>
		</thead>
		
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
     $select=$connexion->query( "SELECT products.id,products.name as marque,price,categories.name FROM products  
	 INNER JOIN categories on products.category_id=categories.id");
     $select->execute();

    $data = $select->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php
  foreach ($data as $cat) {
	
	?>
	<tr> 
		<th scope="row"><?= $cat->id?></th>
		<th scope="row"><?= $cat->marque?></th>
		<th scope="row"><?= $cat->price?></th>
		<th scope="row"><?= $cat->name?></th>
		<th scope="col">
		
		
		
		
		    
		   <a href="lire.php?id=<?= $cat->id ?>">
					<button class="btn btn-primary" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button>
		    </a>
			</th>
			<th>
			<a href="modifier.php?id=<?= $cat->id ?>">
					<button class="btn btn-warning" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button>
			</a>
			<a href="supprimer.php?id=<?= $cat->id ?>">
					<button class="btn btn-danger" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button>
			</a>
			</th>
	</tr>
	
	<?php
}
?>
</div>
</tbody>
	</thead>

	</table>




</body>
</html>

