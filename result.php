<?php 
session_start(); // création de la session ou utilisation des variables de la session (sur les utres pages du site)
$alea = $_SESSION['alea']; // recuperation de la valeur aleatoire à deviner depuis session
$saisi = $_POST['choix'];  // récuperation de la valeur saisi par l'utilisateur depuis le formulaire
$_SESSION['essai']++ ; // on incremente le compteur 
// on compare le nombre saisir par l'utilisateur au nombre aleatoire
$message = '';
if ($saisi < $alea){
	$message = " La valeur recherché est plus grand que $saisi";
}
elseif ($saisi > $alea) {
		$message = "La valeur recherché est plus petit que $saisi";
}
else{
	$message = "Bravo ! vous avez trouvé le nombre magique en " .$_SESSION['essai'] . "essais." ;

}
?>
<!Doctype html>
<html>
<title>Result</title>
<meta charset="UTF-8">

<body onload="document.getElementById('pseudo').focus()"> <!--pointeur souris automatique sur le champs du formulaire -->
<?php
echo "<center><h1>Le but de ce jeu est de trouver le numéro magique compris entre 1 et 100</h1>";
echo "$message";
if ($saisi == $alea){ // verifier si la valeur saisi par l'utilisateur est egale à la valeur aleatoire
echo "<form name='result' method='post' action='statistique.php'>
	<table border=0>
	<tr><td>Veuillez entrer votre pseudo </td><td> <input type='text' name='pseudo' id='pseudo' /></td></tr>
	<input type='hidden' name='nombre_trouve' value='$alea' />
    <input type='hidden' name='nombre_essais' value='" . $_SESSION['essai'] . "' />
    </table>";	
	echo "<input type='submit' name='valeur' value='Valider'/> 
	</form></center>";
}
else{
	echo "<form name='result' method='post' action='indexRechercheNombre.php'>
	<table border=0>";
	echo "<input type= 'submit' name='jouer' value='reesayer' />  ";
}

?>
</body>

</html>