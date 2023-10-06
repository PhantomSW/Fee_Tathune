<?php session_start(); 
if(!isset($_SESSION['code'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Profil intervenant';
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
            
                $q= 'SELECT * FROM INTERVENANT WHERE prof_id = :prof_id';
                $req = $bdd->prepare($q);
                $req->execute([
                    'prof_id' => $_GET['prof_id']
                ]);
                $result = $req->fetch(PDO::FETCH_ASSOC);

                if($result){
                    if (strlen($result['image'])>2) {
                        echo '<div class="col-lg-3">
                        <img src="uploads/'.$result['image'].'" alt="image profil" style="width:100px; height:100px;" class="rounded-circle mb-4">
                        </div> ';
                    }
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
                                <h3>Profession :</h3>
                                <p>➼ '.$result['profession'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <p>➼ '.$result['email'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Diplôme :</h3>
                                <p>➼ '.$result['diplome'].'</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Expérience :</h3>
                                <p>➼ '.$result['experience'].' ans</p>
                            </div>
                            <div class="col-lg-4">
                                <h3>Note :</h3>
                                <p>➼ '.$result['note'].'/10 ★</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Description :</h3>
                                <p>➼ '.$result['description'].'</p>
                            </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_intervenants.php">Retour</a>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>