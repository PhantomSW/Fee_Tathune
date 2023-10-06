<?php
session_start();
include('includes/bdd.php');

$q = 'SELECT user_id FROM UTILISATEUR WHERE email = :email AND pwd = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_SESSION['connect'],
	'password' => hash('sha256', $_POST['password'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

if(!$results) {
	$msg = 'Le mot de passe est invalide.';
	header('location: user_avatar.php?type=danger&message=' . $msg);
	exit();
} else {

$q = 'UPDATE AVATAR SET 
	color = :color,
	hat = :hat,
	eyes = :eyes,
	nose = :nose,
	smile = :smile
 	WHERE idCon = :idCon';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'color' => $_SESSION['color'],
	'hat' => $_SESSION['hat'],
	'eyes' => $_SESSION['eyes'],
	'nose' => $_SESSION['nose'],
	'smile' => $_SESSION['smile'],
	'idCon' => $_SESSION['user_id']
]);
}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: user_avatar.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Avatar changé avec succès !';
header('location: user_avatar.php?type=success&message=' . $msg);
exit();


?>




