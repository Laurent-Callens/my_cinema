<!DOCTYPE html>
<html>
<head>
	<title>Historique des films vus</title>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
</head>
<body>
<header>
   <p>My Cinema</p>
   <nav>
      <div class="Boutons">
         <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="findfilm.php">Rechercher un film</a></li>
            <li><a href="members.php">Membres</a></li>
            <li><a href="abonnement.php">Abonnements</a></li>
            <li><a href="change.php">Devenir membre</a></li>
         </ul>
      </div>
   </nav>
</header>
<div class="php--findfilm">
<?php

$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$idmembre = $_GET['idmembre'];
$pdo = new PDO($dsn, $user, $passwd);

$sth = $pdo->prepare("SELECT titre FROM film INNER JOIN membre INNER JOIN historique_membre USING(id_membre, id_film) WHERE id_membre LIKE '$idmembre'");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);
   	foreach ($print as $keyone => $valuefilm) {
   		foreach ($valuefilm as $keytwo => $valuetwo) {
   			$ath = $pdo->prepare("SELECT id_film from film WHERE titre LIKE '$valuetwo'");
$ath->execute();
$print = $ath->fetchAll(PDO::FETCH_ASSOC);
foreach ($print as $key => $value) {
	foreach ($value as $key => $valueid) {
		$id_film = $valueid;
	}
}
   			echo "$valuetwo <a href='avis.php?titre=$valuetwo&idmembre=$idmembre&idfilm=$id_film'> Mettre un avis sur ce film </a><br><br><br>";
   			
   		}
   	}

echo "<a href='addhistorique.php?idmembre=$idmembre'> Ajouter un film a cet historique</a><br>";
?>
</div>
<footer>
<div class="form-footer">
<p class="comm">Vous voulez laisser un commentaire ?</p>
<form class="formfooter">
<label>Nom</label>
<input type="text" name="nom" placeholder="ex : Dupont">
<label>Prenom</label>
<input type="text" name="prenom" placeholder="ex : Jean-michel"><br>
<label>E-mail</label>
<input type="email" name="email" placeholder="ex : exemple@gmail.com"><br>
<label>Commentaire</label>
<textarea name="commentaire" placeholder="Tappez votre commentaire"></textarea><br>
<input type="submit" name="Envoyer" value="Envoyer">
</form>  
</div>   
</footer>
</body>
</html>