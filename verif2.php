<?php 

// ajout de l'email envoyé à un cookie
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600);
}

// Vérification du formulaire

// Si un des champs vides alors redirection vers le formulaire
if( !isset($_POST['firstname'])
	|| !isset($_POST['name'])
	|| !isset($_POST['phone'])
	|| !isset($_POST['address'])
	|| !isset($_POST['gender'])
	|| !isset($_POST['age'])
	|| empty($_POST['firstname'])
	|| empty($_POST['name'])
	|| empty($_POST['phone'])
	|| empty($_POST['address'])
	|| empty($_POST['gender'])
	|| empty($_POST['age'])
){
		// redirection avec un message d'erreur
		$msg = 'Vous devez remplir tous les champs.';
		header('location: inscription_2.php?message=' . $msg);
		exit();
}

// Tel

if(strlen($_POST['phone']) < 10){
	// redirection avec un message d'erreur
	$msg = 'Indiquez un numéro de téléphone sous la forme 0611223344.';
	header('location: inscription_2.php?message=' . $msg);
	exit();
}

// Si le genre est incohérent

if($_POST['gender'] != "homme" && $_POST['gender'] != "femme"){
	// redirection avec un message d'erreur
	$msg = 'Veuillez indiquer si vous êtes un homme ou une femme dans le genre.';
	header('location: inscription_2.php?message=' . $msg);
	exit();
}

// Si on arrive ici, c'est que tout est bon : insertion en bdd

// Connexion à la bdd
include('includes/bdd.php');

// Vérifier que le numéro n'est pas déjà utilisé
$q = 'SELECT user_id FROM UTILISATEUR WHERE phone = :phone';
$req = $bdd->prepare($q);
$req->execute([
				'phone' => $_POST['phone']
]);
$reponse = $req->fetch(); // récipération de la 1er ligne, renvoie false si rien de trouvé
if ($reponse != false){
	$msg = 'Le numéro de téléphone est déjà utilisé.';
	header('location: inscription_2.php?message=' . $msg);
	exit();
}


// Concaténation de la requete : DANGER !!!!!
//$q = 'INSERT INTO users (email, password) VALUES ("' . $_POST['email'] . '", "' . $_POST['pwd'] . '")';

// Exécution directe de la requête
//$reponse = $bdd->exec($q); // la methode exec renvoie le nb de lignes modifiées.


// Requête préparée : Sécurité, prospérité et bonheur !!!
$q = 'INSERT INTO UTILISATEUR (firstname, name, phone, address, gender, age) VALUES (:firstname, :name, :phone, :address, :gender, :age)';
// Envoi de la requête préparée à la bdd : pdo statement (déclaration pdo)
$req = $bdd->prepare($q);

// Exécution de la requete préparée
$reponse = $req->execute([ 
	'firstname' => $_POST['firstname'],
	'name' => $_POST['name'],
	'phone' => $_POST['phone'],
	'address' => $_POST['address'],
	'gender' => $_POST['gender'],
	'age' => $_POST['age']
]);



if($reponse == 0){
	// redirection avec un message d'erreur
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: inscription.php?message=' . $msg);
	exit();
}

// Si on arrive ici, c'est que l'utilisateur a été créé en bdd

// redirection vers l'acceuil avec un message
$msg = 'Compte créé avec succès !';
header('location: connexion.php?message=' . $msg);
exit();


?>




