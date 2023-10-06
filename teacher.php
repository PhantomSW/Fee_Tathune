<?php
$title = 'Professeurs';
include('includes/head.php');
?>
<body class="color-mode">

    <?php include('includes/header.php'); ?>
    <main class="mx-2">
        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <h2>Nos professeurs</h2>
                <p>Nous avons à votre disposition de nombreux professeurs compétents, recrutés sur leur savoir majoritairement développé grâce à leur expérience professionnel.<br>Vous trouverez ci-dessous l'ensemble de nos professeurs actuellement présent au sein de notre entreprise. Ils sont prêt à prendre contact avec vous si l'un d'entre eux vous correspond !</p>
            </div>
        </div>
        <?php include('includes/message.php'); ?>

        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <?php include('includes/bdd.php'); 
				$q = "SELECT * FROM INTERVENANT WHERE profession = 'professeur'";
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);

            foreach ($results as $user)  {
            echo '<div class="card" style="background-color: #DCDCDC; width: 15rem; margin-right:30px;">
                <img class="card-img-top mt-2 rounded-circle" src="uploads/'.$user['image'].'" alt="Card image cap">
                <div class="card-body text-center">
                    <h5 class="card-title text-center" style="color:#181c2e; text-decoration: underline;"><strong>'.$user['firstname'].' '.$user['name'].'</strong></h5>
                    <p class="card-text" style="color:#181c2e; margin-bottom:0rem;">Diplôme : '.$user['diplome'].'</p>
                    <p class="card-text" style="color:#181c2e;">Travail depuis '.$user['experience'].' ans</p>
                    <p class="card-text" style="color:#181c2e; margin-bottom:0rem;">Évaluation : '.$user['note'].'/10 ★</p>
                    <a href="read_intervenant.php?id='.$user['prof_id'].'" class="mt-3 btn btn-outline-secondary btn-sm">Plus d"informations</a>
                </div>
            </div>'; }
        ?>
         
        </div>

           
    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

