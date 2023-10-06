<?php
$title = 'Intervenant';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 100px;
    }
    
</style>
	<body class="color-mode">
		<?php 
        include('includes/header.php');
        include('includes/bdd.php');
        $q= 'SELECT * FROM INTERVENANT WHERE prof_id = :id';
            $req = $bdd->prepare($q);
            $req->execute([
                'id' => $_GET['id']
            ]);
            $result = $req->fetch(PDO::FETCH_ASSOC);
        
        echo ' 
		<main>
        <div class="container">
			<h1>'. $result['firstname'] . ' ' . $result['name']. '</h1>';
			include('includes/message.php');                

                if($result){
                    if (strlen($result['image'])>2) {
                        echo '<div class="col-lg-5"></div>
                        <div class="col-lg-2">
                        <img src="uploads/'.$result['image'].'" alt="image profil" style="width:150px; height:150px;" class="rounded-circle mb-4">
                        </div> ';
                    }
                    echo '<div class="row mb-3">
                            <div class="col-lg-8">
                                <label><b> Description : </b></label>  
                                <p>'.$result['description'].'</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label><b> Diplôme : </b></label>
                                <p>'.$result['diplome'].'</p>
                                <label><b> Profession : </b></label>
                                <p>'.$result['profession'].'</p>
                                <label><b> Experience : </b></label>
                                <p>'.$result['experience'].' ans</p>
                                <label><b> Note : </b></label>
                                <p>'.$result['note'].'/10 ★</p>
                                <br>
                                <h3>Contact :</h3>
                                <p>'.$result['email'].'</p>
                            </div>
                        </div>';
                        
                        if($result['profession'] == 'professeur') {
                            echo '<a class="btn btn-sm btn-danger" href="teacher.php">Retour</a>';
                        } else {
                            echo '<a class="btn btn-sm btn-danger" href="investisseur.php">Retour</a>';
                        }
                } else {
                    echo '<h2 style="color:red;">Impossible d\'afficher les informations</h2>';
                }
            ?>
            </div>
		</main>

		<?php include('includes/footer.php'); ?>
	</body>
</html>