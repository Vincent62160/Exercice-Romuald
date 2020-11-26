<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css%22%3E">

    <title>Document</title>
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
   $select=$connexion->query("SELECT * FROM categories WHERE id=".$_GET['id']);

            while($s = $select->fetch(PDO::FETCH_OBJ)){

          echo  "<div class='container'>".
                "<h1 class='text-center mt-4 mb-4'>Fiche catégorie</h1>".
                "<div class='row shadow p-3 mb-5 bg-white rounded'>".
                'Nom : ' .$s->name."</br>".
                'Id :' .$s->id."</br>".
                'Date de création :'.$s->created."</br>".
                'Date de modification :'.$s->modified."</div>"."</div>";
      }



?>


</body> 
</html>