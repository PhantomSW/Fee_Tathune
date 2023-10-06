<?php
session_start();
if($_POST['confirm'] != $_SESSION['verification']){
	$msg = 'Le code est incorrect.';
	header('location: email-check.php?type=danger&message=' . $msg);
	exit();
}

if($_POST['confirm'] == $_SESSION['verification']){

include('includes/bdd.php');

$q = 'INSERT INTO UTILISATEUR (pseudo, email, pwd, firstname, name, phone, address, gender, age, ban) VALUES (:username, :email, :password, :firstname, :name, :phone, :address, :gender, :age, :ban)';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'username' => $_SESSION['username'],
	'email' => $_SESSION['email'], 
	'password' => hash('sha256', $_SESSION['password']),
	'firstname' => $_SESSION['firstname'],
	'name' => $_SESSION['name'],
	'phone' => $_SESSION['phone'],
	'address' => $_SESSION['address'],
	'gender' => $_SESSION['gender'],
	'age' => $_SESSION['age'],
	'ban' => 0
]);

$a = 'SELECT * FROM UTILISATEUR WHERE email = :email';
$requ = $bdd->prepare($a);
$requ->execute([
    'email' => $_SESSION['email']
]);
$res = $requ->fetch(PDO::FETCH_ASSOC);

$val = 1;
$q = 'INSERT INTO AVATAR (color, idCon) VALUES (:color, :idCon)';
$req = $bdd->prepare($q);
$reponse = $req->execute([
	'color' => $val,
	'idCon' => $res['user_id']
]);


if($reponse == 0){
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: inscription.php?type=danger&message=' . $msg);
	exit();
}

$msg = 'Compte créé avec succès !';
header('location: captcha/captcha.php?type=success&message=' . $msg);
exit();

}

?>