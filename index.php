<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
	<title>My Cinema</title>
	<link href="https://fonts.googleapis.com/css?family=Italianno&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Gruppo&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
	<div class="titre">
		<img src="http://download.seaicons.com/icons/itzikgur/my-seven/512/Movies-Oscar-icon.png">
		<p><strong>My Cinema</strong></p>
	</div>
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
<div class="Presentation">
	<img src="http://img.over-blog-kiwi.com/0/71/40/63/obpicbRTU58.jpeg">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at tincidunt risus. Nullam eleifend, sem at consectetur pharetra, dui urna placerat ipsum, gravida laoreet metus velit id metus. Donec non sem vel velit vulputate hendrerit at ut velit. Sed lectus purus, euismod eu finibus ac, pretium id dolor. Nulla iaculis orci sit amet arcu imperdiet varius. Ut eget felis finibus, pellentesque lectus sed, aliquet eros. Aliquam lorem odio, vulputate tempor consequat id, sollicitudin ut diam. Nulla posuere neque vel maximus rutrum. Curabitur ultrices, eros a venenatis rhoncus, magna nunc imperdiet sapien, sit amet vehicula felis nulla sit amet arcu. Vestibulum sed sagittis nulla, vitae aliquam tortor. Donec congue dapibus sapien. Suspendisse vel tincidunt neque. Sed quis tincidunt tortor. Vestibulum accumsan ligula nibh, a venenatis leo viverra sit amet.

	Nam blandit quam quis enim condimentum, non semper diam feugiat. Nulla finibus est nec placerat auctor. Nullam congue ultricies mi nec vulputate. Cras nec tincidunt sapien. Integer vel felis in lorem finibus efficitur id vitae nulla. Morbi congue metus urna, ac scelerisque lorem tempus in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed dapibus enim nec faucibus consequat. Morbi ac sapien mi. Nulla auctor porttitor sem in sagittis. Nam eu dictum felis. Vestibulum pharetra faucibus massa, pulvinar tincidunt nisi tristique at. Suspendisse vehicula aliquam augue pellentesque bibendum. Mauris euismod, nibh sit amet bibendum scelerisque, metus lacus lobortis augue, ac ultricies ipsum nibh in nunc. Maecenas iaculis posuere mollis. Nunc lectus turpis, imperdiet eu dolor sit amet, luctus porta metus.

	Fusce lobortis dui in urna semper, id condimentum nunc tristique. Cras molestie dapibus mollis. Nunc fermentum luctus justo, vel malesuada mauris facilisis vitae. Aliquam erat volutpat. Mauris fermentum dui sit amet velit rhoncus pretium. Duis eu facilisis risus, vel imperdiet neque. Duis ullamcorper facilisis leo nec dictum. Praesent gravida nibh vitae nisi semper posuere. Sed eget ultrices leo. Mauris eu mattis nisl. Maecenas feugiat non ipsum ut ultrices. Aenean quis risus est. In molestie metus finibus elit consequat, at pulvinar turpis ultrices. Nam aliquet, mi quis dignissim auctor, mi libero fermentum felis, quis interdum elit leo a metus.

	Vivamus laoreet, odio quis vulputate condimentum, mi augue commodo est, mollis elementum lorem mi id tortor. Pellentesque leo lectus, interdum non nibh id, luctus sodales massa. Integer mollis vestibulum quam. Sed pharetra est in diam euismod, a maximus urna iaculis. Aliquam ut ornare ipsum. Morbi et fermentum augue. Donec eu justo laoreet, vulputate orci vel, porta ipsum. Phasellus eleifend convallis varius. In in orci nec leo eleifend blandit quis vel ligula. Fusce non fermentum magna.

	Maecenas semper odio libero, eget elementum lectus molestie eget. Ut tempor sem lacus, non maximus odio varius et. Sed mi tellus, feugiat vel tellus non, efficitur facilisis felis. Donec convallis congue erat a imperdiet. Donec pulvinar fringilla ligula, vitae posuere mauris pharetra id. Praesent quis felis ac purus feugiat auctor. Aenean faucibus sapien sit amet nisi convallis, sed semper dolor ullamcorper. Maecenas fringilla neque vitae nisi malesuada aliquet. Curabitur pulvinar ante in sollicitudin tincidunt. Nam tortor ex, auctor quis sapien tempor, varius consequat ante. </p>
</div>
<div class="row-comm">
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$pdo = new PDO($dsn, $user, $passwd);

$sth = $pdo->prepare("SELECT commentaire FROM commentaire_site ORDER BY date DESC LIMIT 10");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);
echo "<p style='fontsize: 1.5em;'><strong>Liste des derniers commentaires</strong><p><br><br>";
foreach ($print as $key => $value) {
	
	foreach ($value as $key => $commentary) {
		echo "'$commentary'<br> ";
	}
	echo "<br>";
	

}
?>	
</div>
<footer>
	<div class="form-footer">
		<p class="comm">Vous voulez laisser un commentaire ?</p>
		<form class="formfooter" method="get">
			<label>Nom</label>
			<input type="text" name="nom" placeholder="ex : Dupont" required>
			<label>Prenom</label>
			<input type="text" name="prenom" placeholder="ex : Jean-michel" required><br>
			<label>E-mail</label>
			<input type="email" name="email" placeholder="ex : exemple@gmail.com" required><br>
			<label>Commentaire</label>
			<textarea cols='33' rows="10" name="commentaire" placeholder="Tappez votre commentaire" required></textarea><br>
			<input type="submit" class="btn" name="Envoyer" value="Envoyer">
		</form>	
	</div>
<?php
$nom = $_GET['nom'];
$prenom = $_GET['prenom'];
$email = $_GET['email'];
$comm = $_GET['commentaire'];
$sth = $pdo->prepare("INSERT INTO commentaire_site (nom, prenom, email, commentaire, date) VALUES ('$nom', '$prenom', '$email', '$comm', NOW()) ");
if (!empty($comm)) {
	$sth->execute();
}

?>
</footer>
</body>
</html>