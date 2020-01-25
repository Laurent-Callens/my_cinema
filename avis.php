<!DOCTYPE html>
<html>
<head>
	<title>Avis</title>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Italianno&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gruppo&display=swap" rel="stylesheet"> 
</head>
<body>
<?php
$titre = $_GET['titre'];
$idmembre = $_GET['idmembre'];
$id_film= $_GET['idfilm'];
?>
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
<form name="formavis" class="formavis" method="get">
<label><strong>Avis</strong></label><br>
<textarea rows="5" cols="33" name="avis" placeholder="tappez votre avis" value="" class="form-control"></textarea>
<input type="hidden" name="titre" value=<?php echo"$titre"; ?>>
<input type="hidden" name="idmembre" value=<?php echo"$idmembre"; ?>>
<input type="hidden" name="idfilm" value=<?php echo"$id_film";?>>
<input type="submit" name="Envoyer" class="btn" value="Envoyer">
</form>
<?php

$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$pdo = new PDO($dsn, $user, $passwd);

$titre = $_GET['titre'];
$idmembre = $_GET['idmembre'];
$avis= $_GET['avis'];
$id_film= $_GET['idfilm'];


$sth = $pdo->prepare("UPDATE historique_membre SET avis_film='$avis' WHERE id_membre='$idmembre' AND id_film='$id_film'");
$sth->execute();
?>
<footer>
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
</footer>
</body>
</html>