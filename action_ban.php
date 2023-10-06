<?php
include('includes/bdd.php');

$q = 'UPDATE UTILISATEUR SET ban = 1 WHERE user_id = :user_id';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'user_id' => $_GET['user_id']
]);

if($reponse == 0){
	$msg = 'Erreur lors du ban en base de données.';
	header('location: admin_utilisateurs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte banni avec succès !';
header('location: admin_utilisateurs.php?type=success&message=' . $msg);
exit();


?>