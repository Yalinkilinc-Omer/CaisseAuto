<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket promotions</title>
    
    <!-- PARTIE CSS -->
    <link rel="stylesheet" href="ticket-styles.css">

</head>
<body>
    <table id="clients">
        <tr>
            <th id="a">Article</th>
            <th id="b">Prix initial</th>
            <th id="c">Prix promo</th>
        </tr>

    <?php
    // on inclue la connexion pour la page a l'aide de "connexion.php"
    include("connexionn.php");
    
    // selectionner tout les donnees dans la table promotions,
    // et les stockers dans la variable $recupere,
    $recupere = "SELECT * FROM promotions";
    
    // dans la varible "$resultat", on execute la varibale "$con" qui est dans "connexion.php",
    // ensuite on execute la requete query contenant la varibale, 
    // "$recupere", et les stock dans la variable $resultat
    $resultat = $con->query($recupere);

    // on verifie si il existe des donnees plus grand a 0 dans la varibale $resultat,
    if($resultat -> num_rows > 0) {
        // tanque il existe des donnees, on les stock dans la varibale $recupere grace,
        // a la fonction fetch_assoc();
        while($recupere = $resultat-> fetch_assoc()){
            
            // on ajoute des tables et les colonnes
            echo "
        <tr>
            <td>".$recupere['nom_articles']."</td>
            <td><s>".$recupere['prix']."€</s></td>
            <td>".$recupere['prix_promotions']."€</td>
        </tr>
            ";       
        }
    }
    
    else {
        // Si Erreur, la BDD est vide ou pas de promotions,on affiche un echo
        echo"<h1> La BDD est vide, une erreur ou pas de promo.</h1>";
    }
    
    ?>
</table>
<!-- TOTAL PROMOTIONS  -->

<?php

/* Requete SQL permettant de selectionner les prix promotions dans la table promotions,*/
$query = "SELECT SUM(prix_promotions) AS totale_promotions FROM promotions";

/* on stock $con et $query dans totale,*/
$totale = mysqli_query($con,$query);

/* totale est stocker dans $valeur, pour etre afficher dans un echo"text"; */
$valeur = mysqli_fetch_array($totale);

/* Affichage de la varibale $valeur d'ou le totale des prix est stocké,*/
echo "<h2>Total:&nbsp;".$valeur['totale_promotions']."€</h2>";


?>
</body>
</html>

