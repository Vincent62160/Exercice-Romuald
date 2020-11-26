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



           
		  $select=$connexion->query("DELETE FROM categories WHERE id=".$_GET['id']);
		  header('Location: category.php');
		  
          
		   
		  
?>   