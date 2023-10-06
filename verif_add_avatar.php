<?php 

if(isset($_FILES['image'.$_GET['type']]) && $_FILES['image'.$_GET['type']]['error'] != 4){
	$acceptable = ['image/png'];
	if (!in_array($_FILES['image'.$_GET['type']]['type'], $acceptable)){
		$msg = 'L\'image doit être de type png !';
		header('location: add_avatar.php?type=danger&message=' . $msg);
		exit();
	}

	$maxSize = 3 * 1024 *1024;
	if ($_FILES['image'.$_GET['type']]['size'] > $maxSize){
		$msg = 'L\'image doit faire moins de 3Mo';
		header('location:  add_avatar.php?type=danger&message=' . $msg);
		exit();
	}

	$q = 'SELECT * FROM MAX WHERE';
	$req = $bdd->query($q);
	$results = $req->fetchAll(PDO::FETCH_ASSOC);
	$type = $_GET['type'];

	foreach($results as $res) {
		$max = $res[$type];
	}

	$filename = $type . $max . '.png';

	$destination = 'avatar/'.$filename;
	if(!move_uploaded_file($_FILES['image'.$_GET['type']]['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location:  add_avatar.php?type=danger&message=' . $msg);
		exit();
	}

	$q = 'UPDATE MAX SET 
	color = :color,
	hat = :hat,
	eyes = :eyes,
	nose = :nose,
	smile = :smile
 	WHERE idCon = :idCon';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'color' => $['color'],
	'hat' => $['hat'],
	'eyes' => $['eyes'],
	'nose' => $['nose'],
	'smile' => $['smile'],
	'idCon' => $['idCon']
]);

}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: user_profil.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Profil mis à jour avec succès !';
header('location: user_profil.php?type=success&message=' . $msg);
exit();

	$msg = 'Photo mise à jour.';
	header('location: add_avatar.php?type=success&message=' . $msg);
	exit();

} else {
	$msg = 'Aucune photo n\'a été ajoutée.';
	header('location: add_avatar.php?type=danger&message=' . $msg);
	exit();
}

?>




