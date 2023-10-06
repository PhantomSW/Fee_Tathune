<?php session_start(); 
if(!isset($_SESSION['code'])){
    header('location: index.php');
    exit;
}
?>
<?php
$title = 'Create';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    h3 {
        color:black;
    }
    
</style>
	<body class="color-mode">
		<?php include('includes/header.php'); ?>

		<main>
        <div class="container">
			<h1>Créer un intervenant :</h1>
			<?php include('includes/message.php'); ?>
            <?php include('includes/bdd.php'); ?>
            
                <form enctype="multipart/form-data" method="POST" action="verif_inter_create.php" class="rounded" style="background-color: #FFFAFA; max-width: 1300px;">
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Prénom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="firstname" class="form-control" name="firstname"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Nom :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="name" class="form-control" name="name"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Photo de profil :</h3>
                                <input type="file" class="form-control" name="image" accept="image/jpeg, image/png, image/gif, image/jpg">
                                <small id="imageHelp" class="form-text">Format carré de préférence.</small>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Profession :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="profession" class="form-control" name="profession"/>
                                    <small id="professionHelp" class="form-text">intervenant / professeur</small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>E-mail :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="email" class="form-control" name="email"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <h3>Diplôme :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="diplome" class="form-control" name="diplome"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Expérience :</h3>
                                <div class="form-outline mb-4">
                                    <input type="number" id="experience" class="form-control" name="experience"/>
                                    <small id="experienceHelp" class="form-text">Indiquez un nombre d'années.</small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h3>Note :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="note" class="form-control" name="note"/>
                                    <small id="noteHelp" class="form-text">Exemple : 7.6</small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <h3>Description :</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" id="description" class="form-control" name="description"/>
                                </div>
                            </div>

                        <div class="row mb-3">
                        <div class="text-center pt-1 mt-5 pb-1">
                            <input type="submit" value="Créer">
                        </div>
                        </div>
                        <a class="btn btn-sm btn-danger" href="admin_intervenants.php">Retour</a>
                    </form>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>