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

    if (isset($_POST['submit'])) {
    	//si on clique sur le bouton s'inscrire
    	$name = $_POST['name'];
    	$firstname = $_POST['firstname'];
    	$Email = $_POST['Email'];
    	$password = $_POST['password'];
    	$repeatpassword = $_POST['repeatpassword'];
    	//identifier les variables

    	  if ($name&&$firstname&&$Email&&$password&&$repeatpassword) {

    	  	if ($password==$repeatpassword) 
    	  	  { 
    	  	  	$password= md5($password);
    	  		$connect=mysqli_connect('localhost','abdallah','passer123','espaceclient');
    	  	
    	  		$requete ="INSERT INTO client VALUES(NULL,'$name','$firstname','$Email','$password')";

    	  		$query= mysqli_query($connect, $requete) or die(mysqli_error($connect));
    	  		die ("inscription terminée, Veuillez vous <a href="connexion.php">connecter<a/>");

    	  		# saisir le même mot de passe
    	  	} else echo "<strong>les deux mot de passe doivent être identiques</strong>";

    	  	# saisir tous les champs pour s'incrire
    	  } else echo "<strong>Veuillez saisir tous les champs</strong>";
    	  
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