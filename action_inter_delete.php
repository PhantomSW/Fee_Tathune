<?php
include('includes/bdd.php');

$q = 'DELETE FROM INTERVENANT WHERE prof_id = :prof_id';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'prof_id' => $_GET['prof_id']
]);

if($reponse == 0){
	$msg = 'Erreur lors de la suppression en base de données.';
	header('location: admin_intervenants.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Intervenant supprimé avec succès !';
header('location: admin_intervenants.php?type=success&message=' . $msg);
exit();

?>