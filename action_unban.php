<?php
include('includes/bdd.php');

$q = 'UPDATE UTILISATEUR SET ban = 0 WHERE user_id = :user_id';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'user_id' => $_GET['user_id']
]);

if($reponse == 0){
	$msg = 'Erreur lors du déban en base de données.';
	header('location: admin_banned_users.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte débanni avec succès !';
header('location: admin_banned_users.php?type=success&message=' . $msg);
exit();


?>