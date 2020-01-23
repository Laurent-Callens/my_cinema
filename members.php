<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="indexstyle.css">
	<title>Findmembers</title>
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
<form name="form1" method="get" class="form">
<label><strong>Chercher un membre par son prenom</strong></label>
<input type="text" name="prenom" placeholder="Prenom" value="" class="form-control">
<label><strong>Chercher un membre par son nom</strong></label>
<input type="text" name="nom" placeholder="Nom" value="" class="form-control">
<label><strong>Limite de resultats</strong></label>
<input type="number" min="1" max="100" name="limit" placeholder="limit" value="1" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<div class="php--findfilm">
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$search = $_GET['prenom'];
$search2 = $_GET['nom'];
$limit = $_GET['limit'];
$pdo = new PDO($dsn, $user, $passwd);

$sth = $pdo->prepare("SELECT prenom, nom FROM fiche_personne WHERE prenom LIKE '%$search%' AND nom LIKE '%$search2%' LIMIT $limit");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($print as $key =>$ligne){
      echo "<br>";
   	foreach ($ligne as $key=>$value) {

   		echo "$value "

   		
   		;
   	}
   	$id = $pdo->prepare("SELECT id_perso FROM fiche_personne WHERE nom LIKE '$value' LIMIT 1");
   	$id->execute();
   	$IDARR = $id->fetchAll(PDO::FETCH_ASSOC);
   	//print_r($IDARR);
$idperso = $IDARR;
   	foreach ($IDARR as $keyone => $valueid) {
   		foreach ($valueid as $keytwo => $valuetwo) {
   			$idperso = $valuetwo;
   		}
   	}
echo "<a href='abonnements.php?id=$idperso'>Plus </a>";
$sth = $pdo->prepare("SELECT id_membre FROM membre WHERE id_fiche_perso LIKE '$idperso'");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);
      foreach ($print as $keyone => $valuefilm) {
         foreach ($valuefilm as $keytwo => $valuethree) {
            $idmembre=$valuethree;
            
         }
      }
echo "<a href='historique.php?idmembre=$idmembre'>Voir son historique</a><br>";
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