<?php 
session_start();
include('includes/bdd.php');

if( !isset($_POST['firstname'])
	|| !isset($_POST['name'])
	|| !isset($_POST['phone'])
	|| !isset($_POST['address'])
	|| !isset($_POST['gender'])
	|| !isset($_POST['age'])
	|| !isset($_POST['password'])
	|| empty($_POST['firstname'])
	|| empty($_POST['name'])
	|| empty($_POST['phone'])
	|| empty($_POST['address'])
	|| empty($_POST['gender'])
	|| empty($_POST['age'])
	|| empty($_POST['password'])
){
		$msg = 'Vous devez remplir tous les champs.';
		header('location: user_profil.php?type=warning&message=' . $msg);
		exit();
}

if(strlen($_POST['phone']) < 10 || strlen($_POST['phone']) > 10){
	$msg = 'Indiquez un numéro de téléphone sous la forme 0611223344.';
	header('location: user_profil.php?type=info&message=' . $msg);
	exit();
}

if(strlen($_POST['age']) > 2){
	$msg = 'Donnez un âge correct.';
	header('location: user_profil.php?type=info&message=' . $msg);
	exit();
}

if(!($_POST['gender'] == "homme" || $_POST['gender'] == "Homme" || $_POST['gender'] == "femme" || $_POST['gender'] == "Femme")){
	$msg = 'Syntaxe incorrect dans genre. Attendu : Homme/homme/Femme/femme.';
	header('location: user_profil.php?type=info&message=' . $msg);
	exit();
}

$q = 'SELECT user_id FROM UTILISATEUR WHERE email = :email AND pwd = :password';
$req = $bdd->prepare($q);
$req->execute([
	'email' => $_SESSION['connect'],
	'password' => hash('sha256', $_POST['password'])
]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

if(!$results) {
	$msg = 'Le mot de passe est invalide.';
	header('location: user_profil.php?type=danger&message=' . $msg);
	exit();
} else {
	$q = 'UPDATE UTILISATEUR SET 
	pseudo = :pseudo,
	email = :email,
	firstname = :firstname,
	name = :name,
	phone = :phone,
	address = :address,
	gender = :gender,
	age = :age
 	WHERE user_id = :user_id';

$req = $bdd->prepare($q);
$reponse = $req->execute([
	'pseudo' => $_POST['pseudo'],
	'email' => $_POST['email'], 
	'firstname' => $_POST['firstname'],
	'name' => $_POST['name'],
	'phone' => $_POST['phone'],
	'address' => $_POST['address'],
	'gender' => $_POST['gender'],
	'age' => $_POST['age'],
	'user_id' => $_GET['user_id']
]);

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
	'idCon' => $_SESSION['idCon']
]);

	$_SESSION['connect'] = $_POST['email'];
}


if($reponse == 0){
	$msg = 'Erreur lors de la mise à jour en base de données.';
	header('location: user_profil.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Profil mis à jour avec succès !';
header('location: user_profil.php?type=success&message=' . $msg);
exit();


?>




