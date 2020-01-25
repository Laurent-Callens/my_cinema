<!DOCTYPE html>
<html>
<head>
	<title>Abo changé</title>
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
<p style="font-size: 1.5em; text-align: center;">Formulaire d'inscription</p>
<form name="form1" method="get" class="form-inscription">
<label><strong>Nom</strong></label>
<input type="text" name="nom" placeholder="nom" value="" class="form-control">
<label><strong>Prenom</strong></label>
<input type="text" name="prenom" placeholder="prenom" value="" class="form-control">
<label><strong>Date de naissance</strong></label>
<input type="date" name="birthdate" placeholder="birthdate" value="" class="form-control">
<label><strong>Email</strong></label>
<input type="email" name="email" placeholder="email" value="" class="form-control">
<label><strong>Adresse</strong></label>
<input type="text" name="adresse" placeholder="adresse" value="" class="form-control">
<label><strong>Code postal</strong></label>
<input type="number" name="postcode" placeholder="code postal" value="" class="form-control">
<label><strong>Ville</strong></label>
<input type="text" name="ville" placeholder="Ville" value="" class="form-control">
<label><strong>Pays</strong></label>
<input type="text" name="pays" placeholder="Pays" value="" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$birthdate = $_GET['birthdate'];
$email = $_GET['email'];
$adresse = $_GET['adresse'];
$postcode = $_GET['postcode'];
$ville = $_GET['ville'];
$pays = $_GET['pays'];

$pdo = new PDO($dsn, $user, $passwd);
$sth = $pdo->prepare("INSERT INTO fiche_personne (nom, prenom, date_naissance, email, adresse, cpostal, ville, pays) VALUES ('$nom', '$prenom', '$birthdate', '$email', '$adresse', '$postcode', '$ville', '$pays')");
$sth->execute();

$ath= $pdo->prepare("SELECT id_perso FROM fiche_personne ORDER BY id_perso DESC LIMIT 1");
$ath->execute();
$idperso = $ath->fetchAll(PDO::FETCH_ASSOC);
   	foreach ($idperso as $keyone => $valueid) {
   		foreach ($valueid as $keytwo => $valuetwo) {
   			$idperso = $valuetwo;
   		}
   	}
$bth = $pdo->prepare("INSERT INTO membre(id_fiche_perso, id_abo, date_abo, date_inscription) VALUES ('$idperso', '0',NOW(), NOW())");
$bth->execute();

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