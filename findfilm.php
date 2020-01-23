<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" type="text/css" href="indexstyle.css">
	<title>findfilms</title>
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
<label><strong>Chercher un film par son titre</strong></label>
<input type="text" name="Find" placeholder="Chercher un film par son titre" value="" class="form-control">
<label><strong>Limite de resultats</strong></label>
<input type="number" min="1" max="100" name="limit" placeholder="limit" value="1" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<div class="php--findfilm">
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$search = $_GET['Find'];
$limit = $_GET['limit'];


$pdo = new PDO($dsn, $user, $passwd);
$sth = $pdo->prepare("SELECT titre, resum FROM film WHERE titre LIKE '%$search%' LIMIT $limit");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_NUM);

foreach ($print as $key =>$ligne){
      echo "--------------<br>";
   	foreach ($ligne as $key=>$value) {
         $takeid = $pdo->prepare("SELECT id_film FROM film WHERE titre='$value'");
         $takeid->execute();
         $print2 = $takeid->fetchAll(PDO::FETCH_ASSOC);
         foreach ($print2 as $key => $idarray) {
            foreach ($idarray as $key => $valueid) {
               $idfilm = $valueid;
            }
         }
         echo "$value<br>"."<br>";
   		
   	}
      echo "<a href='avisfilms.php?idfilm=$idfilm'>Voir les avis </a><br>";
}

?>
</div>
<form name="form1" method="get" class="form">
<label><strong>Chercher un film par son genre</strong></label>
<input type="text" name="findgenre" placeholder="Cherchez un film par son genre" value="" class="form-control">
<label><strong>Limite de resultats</strong></label>
<input type="number" min="1" max="100" name="limitfind" placeholder="limit" value="1" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<div class="php--findfilm">
<?php
$search2 = $_GET['findgenre'];
$limit = $_GET['limitfind'];
$sth2 = $pdo->prepare("SELECT titre, genre.nom FROM genre INNER JOIN film using(id_genre) WHERE genre.nom LIKE '$search2' LIMIT $limit;");
$sth2->execute();
$print2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

foreach ($print2 as $key =>$ligne){
	echo "--------------------------<br>";
   	foreach ($ligne as $key=>$value) {
   		if ($key == "nom") {
   			$key = "Genre";
   		}
   		echo "| $key = $value |<br>";
   	}
}
?>
</div>
<form name="form1" method="get" class="form">
<label><strong>Chercher un film par son distributeur</strong></label>
<input type="text" name="finddistrib" placeholder="Chercher un film par son distributeur" value="" class="form-control">
<label><strong>Limite de resultats</strong></label>
<input type="number" min="1" max="100" name="limitfind2" placeholder="limit" value="1" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<div class="php--findfilm">
<?php
$search2 = $_GET['finddistrib'];
$limit = $_GET['limitfind2'];
$sth2 = $pdo->prepare("SELECT titre, distrib.nom FROM distrib INNER JOIN film using(id_distrib) WHERE distrib.nom LIKE '%$search2%' LIMIT $limit;");
$sth2->execute();
$print2 = $sth2->fetchAll(PDO::FETCH_ASSOC);

foreach ($print2 as $key =>$ligne){
	echo "-----------<br>";
   	foreach ($ligne as $key=>$value) {
   		if ($key == "nom") {
   			$key = "Distributeur";
   		}
   		echo "| $key = $value |<br>";
   	}
}
?>
</div>
<form name="form1" method="get" class="form">
<label><strong>Trouver un film par date de projection</strong></label>
<label>Date minimale</label>
<input type="date" name="datedebut" placeholder="date de debut" value="" class="form-control">
<label>Date maximale</label>
<input type="date" name="datefin" placeholder="date de fin" value="" class="form-control">
<label><strong>Limite de resultats</strong></label>
<input type="number" min="1" max="100" name="limitfind3" placeholder="limit" value="1" class="form-control">
<input type="submit" name="Envoyer" class="btn btn-default" value="Envoyer">
</form>
<div class="php--findfilm">
<?php
$datedebut = $_GET['datedebut'];
$datefin = $_GET['datefin'];
$limit = $_GET['limitfind3'];

$sth3 = $pdo->prepare("SELECT titre, resum FROM film WHERE date_debut_affiche AND date_fin_affiche BETWEEN '$datedebut' AND '$datefin' LIMIT $limit;");
$sth3->execute();
$print3 = $sth3->fetchAll(PDO::FETCH_ASSOC);
foreach ($print3 as $key => $array) {
   echo "----------------<br>";
   foreach ($array as $key => $valuedate) {
      echo "$valuedate<br><br>";
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
