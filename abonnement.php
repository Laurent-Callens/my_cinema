<!DOCTYPE html>
<html>
<head>
	<title>Details des abonnements</title>
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
$pdo = new PDO($dsn, $user, $passwd);
$sth = $pdo->prepare("SELECT * FROM abonnement");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($print as $key =>$ligne){
      echo "---------------------<br>";
   	foreach ($ligne as $key=>$value) {
   		echo " $key : $value<br>";
   		}
   		

   		
}
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
<input type="textarea" name="commentaire" placeholder="Tappez votre commentaire"><br>
<input type="submit" name="Envoyer" value="Envoyer">
</form>	
</div>	
</footer>
</body>
</html>