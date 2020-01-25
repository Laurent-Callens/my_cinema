<!DOCTYPE html>
<html>
<head>
	<title>Avis des films</title>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Italianno&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gruppo&display=swap" rel="stylesheet"> 
	
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
<p style="text-align: center; font-size: 1.5em;">Liste des avis</p>
<div class="php--findfilm">
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$pdo = new PDO($dsn, $user, $passwd);
$id_film = $_GET['idfilm'];

$sth = $pdo->prepare("SELECT avis_film FROM historique_membre WHERE id_film='$id_film'");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);
foreach ($print as $key => $value) {
	echo "------------<br>";
	foreach ($value as $key => $avis) {
		if (empty($avis)) {
			echo "Film vu, aucun avis donné";
		}
		echo "$avis<br>";
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