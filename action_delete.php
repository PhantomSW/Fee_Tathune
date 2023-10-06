<?php
include('includes/bdd.php');
$q = 'DELETE FROM AVATAR WHERE idCon = :user_id';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'user_id' => $_GET['user_id']
]);

$q = 'DELETE FROM UTILISATEUR WHERE user_id = :user_id';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'user_id' => $_GET['user_id']
]);

if($reponse == 0){
	$msg = 'Erreur lors de la suppression en base de données.';
	header('location: admin_utilisateurs.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte supprimé avec succès !';
header('location: admin_utilisateurs.php?type=success&message=' . $msg);
exit();

?>