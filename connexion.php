<!DOCTYPE html>
<html>
<head>
	<title> PAGE YOUTUBE</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <nav>
		<ul>
			<li><a href="vidéos.php">VIDÉOS</a></li>

			<li><a href="connexion.php">CONNEXION</a></li>
			<li><a href="formulaire.php">FORMULAIRE</a></li>
			<li><a href="inscription.php">INSCRIPTION</a></li>

		</ul>
	</nav>


<?php
session_start();

 if (isset($_POST['submit']))
 {     //si on clique sur le bouton se connecter

    	 $Email = $_POST['Email'];
    	 $password = $_POST['password'];
    	//identifier les variables

    	
    	  	  	$password= md5($password);

    	  		$connect=mysqli_connect('localhost','abdallah','passer123','espaceclient');
    	  		  //on se connecte à notre database
    	  	
    	  		$requete = "SELECT * FROM client WHERE Email='$Email' and password='$password'";
    	  		  //on écrit la requete SQL

    	  		$result= mysqli_query($connect, $requete) or die(mysqli_error($connect));
    	  		
         if (mysqli_num_rows($result)==1) 
         {
             header("Location:vidéos.php");

                	# rediriger l'utilisateur vers la page vidéos

          } else echo "<strong>Veuillez vous inscrire pour accéder à nos vidéos</strong>";

    	  			

    	  			
    	  			# code...
} 


    	  		
    	  	

 ?> 

  	  	
    	

	<form method="POST" action="connexion.php">
  
        <p>Email:</p>
		   <input type="email" name="Email">
		<p>Mot de passe:</p>   
		   <input type="password" name="password"><br></br>
		   <input type="submit" value="Se connecter" name="submit">  
		
     </form>



	

</body>
</html>