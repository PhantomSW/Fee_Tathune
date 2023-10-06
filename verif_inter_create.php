<?php 

include('includes/bdd.php');
if(strlen($_POST['description'] > 200)) {
	$msg = 'La description entrée ne doit pas dépasser 255 caractères.';
		header('location: admin_intervenants.php?type=danger&message=' . $msg);
		exit();
}

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
		header('location:  admin_img_captcha.php?type=danger&message=' . $msg);
		exit();
	}

	$timestamp = time();
	$array = explode('.', $_FILES['image']['name']);
	$extension = end($array);

	$filename = 'firstImage-'. $timestamp . '.' . $extension;

	$destination = 'uploads/'.$filename;
	if(!move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
		$msg = 'Erreur lors de l\'enregistrement du fichier';
		header('location: admin_intervenants.php?type=danger&message=' . $msg);
		exit();
	}
	
}


$q = 'INSERT INTO INTERVENANT (firstname, name, profession, email, diplome, experience, note, description, image) VALUES (:firstname, :name, :profession, :email, :diplome, :experience, :note, :description, :image)';
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
	'image' => isset($filename) ? $filename : ''
]);


if($reponse == 0){
	$msg = 'Erreur lors de la création en base de données.';
	header('location: admin_intervenants.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Intervenant ajouté avec succès !';
header('location: admin_intervenants.php?type=success&message=' . $msg);
exit();


?>




