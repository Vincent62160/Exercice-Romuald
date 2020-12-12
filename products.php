
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
	<title>product</title>
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

    // Affichage sur n colonnes
    // Permet de réaliser l'affichage du résultat
    // d'une requête dans un tableau sur n colonnes

    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = 'products';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);

    $req = "SELECT products.id,products.name as marque,price,categories.name FROM products  INNER JOIN categories on products.category_id=categories.id";
     
    //--- Résultat ---//
    $res = mysqli_query($conn,$req);
    //met les données dans un tableau
    while($data = mysqli_fetch_array($res))
    {
    $tablo[]=$data;
    }
    //détermine le nombre de colonnes
    $nbcol=5;

   
    $nb=count($tablo);
    for($i=0;$i<$nb;$i++){
     
    //les valeurs à afficher
    $valeur1=$tablo[$i]['id'];
    $valeur2=$tablo[$i]['marque'];
    $valeur3=$tablo[$i]['price'];
	$valeur4=$tablo[$i]['name'];
	
	if($i%$nbcol==0)
	
	echo '<tbody>';
    echo '<tr>';
    echo '<th scope="row">'.$valeur1.'</th>';
	echo '<td>'.$valeur2.'</td>';
	echo '<td>'.$valeur3.'</td>';
	echo '<td>'.$valeur4.'</td>';
	echo '<td>'.'
				<a href="lire.php?id='.$valeur1.'">
					<button class="btn btn-primary" type="submit"><i class="fa fa-bars" aria-hidden="true"></i> Lire</button>
				</a>
				<a href="modifier.php?id='.$valeur1.'">
					<button class="btn btn-warning" type="submit"><i class="fa fa-spinner" aria-hidden="true"></i> Modifier</button>
				</a>
				<a href="supprimer.php?id='.$valeur1.'">
					<button class="btn btn-danger" type="submit"><i class="fa fa-minus-square" aria-hidden="true"></i> Supprimer</button>
				</a>'.
			'</td>'.
			'</div>';
			
			
			
			
			


    if($i%$nbcol==($nbcol-1))
	
    echo '</tr>';
	echo '</tbody>';

    }
	echo '</table>';
	echo '</div>';
	
?>


</body>
</html>

