<?php 

if(isset($_FILES['image']) && $_FILES['image']['error'] != 4){
	$acceptable = ['image/jpeg','image/png','image/gif', 'image/jpg'];
	if (!in_array($_FILES['image']['type'], $acceptable)){
		$msg = 'Le fichier doit être de type jpeg, jpg, png ou gif !';
		header('location: admin_intervenants.php?type=danger&message=' . $msg);
		exit();
	}

	$maxSize = 2 * 1024 *1024;
	if ($_FILES['image']['size'] > $maxSize){
		$msg = 'Le fichier doit faire moins de 2Mo';
		header('location: admin_intervenants.php?type=danger&message=' . $msg);
		exit();
	}

	list($width, $height) = getimagesize($_FILES['image']['tmp_name']);
	if ($width !== $height) {
		$msg = 'L\'image doit être carrée.';
		header('location:  admin_intervenants.php?type=danger&message=' . $msg);
		exit();
	}

	$id = $_GET['prof_id'];
	$array = explode('.', $_FILES['image']['name']);
	$extension = end($array);

	$filename = $id . '.' . $extension;

	$destination = 'uploads/'.$filename;
	if(!move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location: admin_intervenants.php?type=danger&message=' . $msg);
		exit();
	}
}

include('includes/bdd.php');

if(isset($_FILES['image']) && $_FILES['image']['error'] != 4) {
$q = 'UPDATE INTERVENANT SET 
	firstname = :firstname,
	name = :name,
	profession = :profession,
	email = :email,
	diplome = :diplome,
	experience = :experience,
	note = :note,
	description = :description,
	image = :image 
 	WHERE prof_id = :prof_id';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'firstname' => $_POST['firstname'],
	'name' => $_POST['name'], 
	'profession' => $_POST['profession'],
	'email' => $_POST['email'],
	'diplome' => $_POST['diplome'],
	'experience' => $_POST['experience'],
	'note' => $_POST['note'],
	'description' => $_POST['description'],
	'image' => isset($filename) ? $filename : '',
	'prof_id' => $_GET['prof_id']
]);
} else {
	$q = 'UPDATE INTERVENANT SET 
	firstname = :firstname,
	name = :name,
	profession = :profession,
	email = :email,
	diplome = :diplome,
	experience = :experience,
	note = :note,
	description = :description
 	WHERE prof_id = :prof_id';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'firstname' => $_POST['firstname'],
	'name' => $_POST['name'], 
	'profession' => $_POST['profession'],
	'email' => $_POST['email'],
	'diplome' => $_POST['diplome'],
	'experience' => $_POST['experience'],
	'note' => $_POST['note'],
	'description' => $_POST['description'],
	'prof_id' => $_GET['prof_id']
]);
}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: admin_intervenants.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Intervenant mis à jour avec succès !';
header('location: admin_intervenants.php?type=success&message=' . $msg);
exit();


?>




