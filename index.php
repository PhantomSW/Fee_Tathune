<?php
$title = 'Fée Tathune';
include('includes/head.php');
?>
<body class="light-mode">

    <?php include('includes/header.php'); ?>

    <section class="banner"></section>
    <main class="bg-alert">
        <h1>Bienvenue chez Fée Tathune !</h1>
        
        <?php include('includes/message.php'); ?>
        <?= isset($_SESSION['email']) ? '<p>[Test-Client]-> Connecté</p>' : '<p>[Test-Client]-> Déconnecté</p>'; ?>
        <?= isset($_SESSION['code']) ? '<p>[Test-Admin]-> Connecté</p>' : '<p>[Test-Admin]-> Déconnecté</p>'; ?>

        <div class="row mb-1">
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <button id="button1" class="" onclick=""><a href="inscription.php"><img src="images/binanceinscription.png" width="325px"></a></button><br>
                <button id="continue" class="" onclick=""><img id="galerie" src="images/continueAvecNoir.png" width="325px"></button><br>
                <button id="button2" class="" onclick=""><a href="connexion.php"><img src="images/googleoui.png" width="325px"></a></button><br>
            </div>
        </div>
        <br><br><br><br>

        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <h2>Qui sommes nous ? </h2>
                <p>Nous sommes une petite entreprise qui vous aide et vous guide <br> pas à pas à vous faire de l'argent grâce à l'investissement dans les cryptomonaies!<br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab.</p>
            </div>
            <div class="col-lg-4">
                <img class="img-fluid" src="images/bitcoin.jpg" alt="image">
                <p><strong>Fée Tathune<br></strong></p>
            </div>
        </div>

        <br><br>

        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <img class="img-fluid" src="images/tradingnon.png" alt="image">
                <p><strong>Trading<br></strong></p>
            </div>
            <div class="col-lg-6">
                <h2>Notre service trading à votre service</h2>
                <p>Vous voulez investir mais vous ne savez par où commencer ? <br>Nos professionnels, dotés d'un master de la Blockchain est là pour le faire ! <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab.</p>
            </div>
        </div>

        <br><br>

        <div class="row mb-3">
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <h2>Canapé trop confortable ?</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab. Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, iure minus. Repellat vel illum illo officiis, iste autem, molestiae ullam neque, nihil eum perferendis iure quae possimus. Delectus, beatae ab.</p>
            </div>
            <div class="col-lg-4">
                <img class="img-fluid" src="images/coursdistanciel.png" alt="image">
                <p><strong>Cours en distanciel<br></strong></p>
            </div>
        </div>

    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

