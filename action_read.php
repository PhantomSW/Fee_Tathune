<?php session_start(); 
if(!isset($_SESSION['code'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Profil utilisateur';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Profil :</h1>
			<?php include('includes/message.php'); ?>
            <?php
                include('includes/bdd.php');
            
                $q= 'SELECT * FROM UTILISATEUR WHERE user_id = :user_id';
                $req = $bdd->prepare($q);
                $req->execute([
                    'user_id' => $_GET['user_id']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    echo '<div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <p> ➼ '.$result['firstname'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <p>➼ '.$result['name'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Pseudonyme :</h3>
                                <p>➼ '.$result['pseudo'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Age :</h3>
                                <p>➼ '.$result['age'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Genre :</h3>
                                <p>➼ '.$result['gender'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <p>➼ '.$result['email'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Téléphone :</h3>
                                <p>➼ '.$result['phone'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Adresse :</h3>
                                <p>➼ '.$result['address'].'</p>
                            </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_utilisateurs.php">Retour</a>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>