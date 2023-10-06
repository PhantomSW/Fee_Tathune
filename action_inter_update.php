<?php session_start(); 
if(!isset($_SESSION['code'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Update';
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
			<h1>Profil à mettre à jour :</h1>
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
                    echo '<form enctype="multipart/form-data" method="POST" action="verif_inter_update.php?prof_id='.$_GET['prof_id'].'" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">';
                    if (strlen($result['image'])>2) {
                        echo '<div class="col-lg-3">
                        <img src="uploads/'.$result['image'].'" alt="image profil" style="width:100px; height:100px;" class="rounded-circle mb-4">
                        </div> ';
                    }
                   echo '            
                    <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="firstname" value="'.$result['firstname'].'" class="form-control" name="firstname"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" value="'.$result['name'].'" class="form-control" name="name"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Profession :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="profession" value="'.$result['profession'].'" class="form-control" name="profession"/>
                                    <small id="professionHelp" class="form-text">intervenant / professeur</small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="email" value="'.$result['email'].'" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Photo de profil :</h3>
                                <input type="file" class="form-control" name="image" accept="image/jpg, image/jpeg, image/png, image/gif">
                                <small id="imageHelp" class="form-text">Format carré de préférence.</small>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Diplôme :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="diplome" value="'.$result['diplome'].'" class="form-control" name="diplome"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Expérience :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="experience" value="'.$result['experience'].'" class="form-control" name="experience"/>
                                    <small id="experienceHelp" class="form-text">Indiquez un nombre d"années.</small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Note :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="note" value="'.$result['note'].'" class="form-control" name="note"/>
                                    <small id="noteHelp" class="form-text">Exemple : 7.6</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Description :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="description" value="'.$result['description'].'" class="form-control" name="description"/>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Mettre à jour">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_intervenants.php">Retour</a>
                        </form>';
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>