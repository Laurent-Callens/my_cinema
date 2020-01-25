<!DOCTYPE html>
<html>
<head>
	<title>test</title>
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
<div class="php--findfilm">
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = "root";
$passwd = "";
$pdo = new PDO($dsn, $user, $passwd);

$idperso = $_GET['id'];
$sth = $pdo->prepare("SELECT * FROM fiche_personne WHERE id_perso LIKE '$idperso'");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($print as $key =>$ligne){
      echo "<br>";
   	foreach ($ligne as $key=>$value) {
   		switch ($value) {
   			case '':
   				$value = "Non renseigné";
   				break;
   			case ' ':
   				$value = "Non renseigné";
   				break;
   		}
   		echo " $key : $value<br>";	
   	}
}
$sth = $pdo->prepare("SELECT id_abo FROM membre WHERE id_fiche_perso LIKE '$idperso'");
$sth->execute();
$print = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($print as $key =>$ligne){
      echo "<br>";
   	foreach ($ligne as $key=>$value) {
   		switch ($value) {
   			case '0':
   				$value = "Pas d'abonnement";
   				break;
   			case '1':
   				$value = "VIP";
   				break;
   			case '2':
   				$value = "GOLD";
   				break;
   			case '3':
   				$value = "Classic";

   				break;
   			case '4' :
   				$value = "Pass Day";
   				break;
   		}

   		  	echo " Abonnement : $value<br>";	
   	}
    
}
?>
<form name="form3" class="form3" method="get">
  <input type="radio" name="abo" value="0" checked> Pas d'abonnement<br>
  <input type="radio" name="abo" value="1"> VIP<br>
  <input type="radio" name="abo" value="2"> GOLD<br>
  <input type="radio" name="abo" value="3"> CLASSIC<br>
  <input type="radio" name="abo" value="4"> PASS DAY<br>
  <input type="hidden" name="id" value=<?php echo "$idperso" ?>>
  <input type="submit" name="envoyer" value="Changer d'abonnement">
 <?php
$abo = $_GET['abo'];
$sth = $pdo->prepare("UPDATE membre SET id_abo='$abo' WHERE id_fiche_perso='$idperso'");
$sth->execute();
?>
</form>
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