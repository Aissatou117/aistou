<?php
session_start(); // création de la session ou utilisation des variables de la session (sur les utres pages du site)
if(!isset($_SESSION['alea']))
	{ 
								
		$alea = rand(1, 100);			// Création d'un nombre aléatoire placé dans la variable $alea
		$_SESSION['alea']=$alea;		// Sauvegarde du nombre aléatoire dans la session
	}
	
if(!isset($_SESSION['essai']))          // Si la variable correspondant au nombre d'essais effectués n'existe
	{									// pas dans la session
		$_SESSION['essai']=0;			// Créaton et initialisation à 0 de celle-ci
	} 
?>
<!Doctype html>
<html>
<title>Jeu</title>
<meta charset="UTF-8">

<body onload="document.getElementById('choix').focus()"> <!--pointeur souris automatique sur le champs du formulaire -->
<?php
echo "<center><h1>Le but de ce jeu est de trouver le numéro magique compris entre 1 et 100</h1>";
echo "<form name='formulaire' method='post' action='result.php'>
	<table border=0>
	<tr><td>Entrer un nombre compris entre 1 et 100 </td><td> <input type='text' name='choix' id='choix' /></td></tr></table>
	<input type='submit' name='jouer' value='Vérifier'/> 
	</form></center>";
?>
</body>

</html>
