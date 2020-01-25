<!DOCTYPE html>
<html>
<head>
	<title>Ajout historique</title>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Italianno&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gruppo&display=swap" rel="stylesheet"> 
</head>
<body>
<?php
$idmembre = $_GET['idmembre'];
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
<div class="php--findfilm">
<form method="get" name="form1" class="form">
<label>Titre du film a ajouter</label>
<input type="text" name="titre" value="">
<input type="hidden" name="idmembre" value=<?php echo"$idmembre" ?>>
<input type="submit" name="Envoyer" value="Envoyer">
</form>
<?php

$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$idmembre = $_GET['idmembre'];
$titre = $_GET['titre'];
$pdo = new PDO($dsn, $user, $passwd);
if (isset($titre)) {
$sth = $pdo->prepare("SELECT id_film FROM film WHERE titre LIKE '%$titre%' LIMIT 1");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($print as $key => $value) {
	foreach ($value as $key => $valueidfilm) {
		$id_film=$valueidfilm;
		$bth = $pdo->prepare("INSERT INTO historique_membre (id_membre, id_film, date) VALUES ('$idmembre', '$id_film', NOW())");
		$bth->execute();

	}	
}
}
?>
</div>
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