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


    if (isset($_POST['submit']))
 {     //si on clique sur le bouton s'inscrire

    	$name = $_POST['name'];
    	$firstname = $_POST['firstname'];
    	$Email = $_POST['Email'];
    	$password = $_POST['password'];
    	$repeatpassword = $_POST['repeatpassword'];
    	//identifier d'abord les variables

    	 if ($password==$repeatpassword) 
    	  	  { 
    	  	  	$password= md5($password);
    	  	  	  // on cripte le mot de passe

    	  		$connect=mysqli_connect('localhost','abdallah','passer123','espaceclient');
    	  		  //on se connecte à notre database
    	  	
    	  		$requete ="INSERT INTO client VALUES(NULL,'$name','$firstname','$Email','$password')";
    	  		  //on écrit la requete SQL

    	  		$query= mysqli_query($connect, $requete) or die(mysqli_error($connect));
    	  		die ("inscription terminée, Veuillez vous <a href='connexion.php'>connecter<a/>");
                  // execution de la requête

    	  		
    	  	} else echo "<strong id='error'>les deux mot de passe doivent être identiques</strong>";
    	  	   # saisir le même mot de passe

}

?>



    <form method="POST" action="inscription.php">

		<p>Nom:</p>
		   <input type="text" name="name" required/>
		<p>Prénom:</p>
		   <input type="text" name="firstname" required/>   
        <p>Email:</p>
		   <input type="email" name="Email" required/>
		<p>Mot de passe:</p>   
		   <input type="password" name="password" required/>
		<p>Confirmer mot de passe:</p>
		   <input type="password" name="repeatpassword" required/> <br></br>
		   <input type="submit" value="S'inscrire" name="submit">  
		

    </form>


	

</body>
</html>