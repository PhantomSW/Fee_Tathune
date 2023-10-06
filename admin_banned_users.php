<?php
$title = 'Admnistration';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 200px;
    }
    
</style>
<body class="color-mode">
    <?php 
    include('includes/header.php'); 
    if(!isset($_SESSION['code'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?type=danger&message=' . $msg);
	    exit();
    }
    ?>
  
    <main class="admin_main">
        <h1> Gestion des utilisateurs </h1>
		<?php include('includes/message.php'); ?>
        <?php include('includes/bdd.php');
		if(isset($_GET['order'])) {
			$order = $_GET['order'];
		} else {
			$order = 'user_id';
		}
				$q = 'SELECT * FROM UTILISATEUR WHERE ban = 1 ORDER BY '. $order;
				$req = $bdd->query($q);
				$results = $req->fetchAll(PDO::FETCH_ASSOC);
				?>

				<table class="table table-dark table-striped mt-4">
						<tr>
							<th scope="col">ID<a href="?order=user_id" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Pseudo<a href="?order=pseudo" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Email<a href="?order=email" style="text-decoration:none; color:white;">&nbsp;↓</a></th>
							<th scope="col">Actions</th>
						</tr>

						<?php
						foreach ($results as $user)  {
							echo '<tr>
									<td>' .$user['user_id'] . '</td>
									<td>' .$user['pseudo'] . '</td>
									<td>' .$user['email'] . '</td>
									<td>
										<a class="btn btn-sm btn-secondary" href="action_read.php?user_id=' .$user['user_id'] . '">Consulter</a>
                    					<a class="btn btn-sm btn-warning" href="action_unban.php?user_id=' .$user['user_id'] . '">Débannir</a>
										<a class="btn btn-sm btn-danger" href="action_delete.php?user_id=' .$user['user_id'] . '">Supprimer</a>
									</td>
								</tr>';
						}
            echo '</table>';
            echo '</main>';
            include('includes/footer.php'); ?>
    </body>
</html>

