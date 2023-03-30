<?php 

// ajout de l'email envoyé à un cookie
if(isset($_POST['email']) && !empty($_POST['email'])){
	setcookie('email', $_POST['email'], time() + 24 * 3600);
}

// Vérification du formulaire

// Si un des champs vides alors redirection vers le formulaire
if( !isset($_POST['username']) 
	|| !isset($_POST['email'])
	|| !isset($_POST['password'])
	|| !isset($_POST['confirm-password'])
	|| empty($_POST['username'])
	|| empty($_POST['email'])
	|| empty($_POST['password'])
	|| empty($_POST['confirm-password'])
){
		// redirection avec un message d'erreur
		$msg = 'Vous devez remplir tous les champs.';
		header('location: inscription.php?message=' . $msg);
		exit();
}


// Si l'email est invalide alors redirection

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	// redirection avec un message d'erreur
	$msg = 'Email invalide.';
	header('location: inscription.php?message=' . $msg);
	exit();
}

// Si les mots de passe ne correspondent pas
if($_POST['password'] != $_POST['confirm-password']){
	$msg = 'Les mots de passe ne correspondent pas.';
	header('location: inscription.php?message=' . $msg);
	exit();
}

// Si le mot de passe ne fait pas 6 caractères minimum

if(strlen($_POST['password']) < 6){
	// redirection avec un message d'erreur
	$msg = 'Le mot de passe doit contenir au minimum 6 caractères.';
	header('location: inscription.php?message=' . $msg);
	exit();

}

// Si on arrive ici, c'est que tout est bon : insertion en bdd

// Connexion à la bdd
include('includes/bdd.php');

// Vérifier que l'email n'est pas déjà utilisé
$q = 'SELECT user_id FROM UTILISATEUR WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute([
				'email' => $_POST['email']
]);
$reponse = $req->fetch(); // récipération de la 1er ligne, renvoie false si rien de trouvé
if($reponse != false){
	$msg = 'Le mail est déjà utilisé.';
	header('location: inscription.php?message=' . $msg);
	exit();
}


// Concaténation de la requete : DANGER !!!!!
//$q = 'INSERT INTO users (email, password) VALUES ("' . $_POST['email'] . '", "' . $_POST['pwd'] . '")';

// Exécution directe de la requête
//$reponse = $bdd->exec($q); // la methode exec renvoie le nb de lignes modifiées.


// Requête préparée : Sécurité, prospérité et bonheur !!!
$q = 'INSERT INTO UTILISATEUR (pseudo, email, pwd) VALUES (:username, :email, :password)';
// Envoi de la requête préparée à la bdd : pdo statement (déclaration pdo)
$req = $bdd->prepare($q);

// Exécution de la requete préparée
$reponse = $req->execute([ 
	'username' => $_POST['username'],
	'email' => $_POST['email'], 
	'password' => hash('sha256', $_POST['password']) // On enregistre le pwd haché
]);



if($reponse == 0){
	// redirection avec un message d'erreur
	$msg = 'Erreur lors de l\'inscription en base de données.';
	header('location: inscription.php?message=' . $msg);
	exit();
}

// Si on arrive ici, c'est que l'utilisateur a été créé en bdd

// redirection vers la suite de l'inscription
header('location: inscription_2.php');
exit();

?>




