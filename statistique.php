<?php
session_start(); // Démarrer une nouvelle session ou reprendre une session existante

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si la méthode de la requête est POST, récupérer les valeurs du formulaire
    $pseudo = $_POST['pseudo']; // Récupérer le pseudo de l'utilisateur depuis le formulaire
    $alea = $_SESSION['alea']; // Récupérer la valeur aléatoire de la session
    $essai = $_SESSION['essai']; // Récupérer le nombre d'essais de la session

    // Ajouter le score dans le fichier statistiquesJeu.txt
    $file = fopen("statistiquesJeu.txt", "a"); // Ouvrir le fichier en mode ajout
    fwrite($file, "$pseudo,$alea,$essai\n"); // Écrire les informations dans le fichier
    fclose($file); // Fermer le fichier
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"> 
    <title>Tableau des scores</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse; /* Fusionner les bordures du tableau */
        }
        th, td {
            border: 1px solid black; /* Bordure noire d'1 pixel autour des cellules */
            padding: 8px;
        }
        th {
            background-color: #f2f2f2; 
        }
        
    </style>
</head>
<body>
    <h2>Tableau des scores</h2>
    <table>
        <tr>
            <th>Pseudo</th>
            <th>Nombre à trouver</th>
            <th>Nombre d'essais</th>
        </tr>
        <?php
        // Lire le fichier statistiquesJeu.txt
        $file = fopen("statistiquesJeu.txt", "r"); // Ouvrir le fichier en mode lecture
        while (($line = fgets($file)) !== false) { // Lire le fichier ligne par ligne
            list($pseudo, $alea, $essai) = explode(",", trim($line)); // Séparer les valeurs par une virgule et supprimer les espaces
            echo "<tr>"; // Ouvrir une ligne de tableau
            echo "<td>$pseudo</td>"; // Afficher le pseudo dans une cellule
            echo "<td>$alea</td>"; // Afficher le nombre à trouver dans une cellule
            echo "<td>$essai</td>"; // Afficher le nombre d'essais dans une cellule
            echo "</tr>"; // Fermer la ligne de tableau
        }
        fclose($file); // Fermer le fichier
        ?>
    </table>
    <br>
    <form action="indexRechercheNombre.php" method="post">
        <input type="submit" value="Rejouer"> <!-- Bouton pour retourner à la page initiale -->
    </form>
</body>
</html>
