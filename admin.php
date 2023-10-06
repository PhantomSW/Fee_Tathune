<?php
$title = 'Admnistration';
include('includes/head.php');
?>
<style>
    main {
        padding-left: 200px;
    }
</style>
<body class="light-mode">
    <?php 
    include('includes/header.php'); 
    if(!isset($_SESSION['code'])){
        $msg = 'Vous n\'êtes pas identifié en tant qu\'administrateur.';
	    header('location: index.php?message=' . $msg);
	    exit();
    }
    ?>

    <main class="admin_main">
        <h1> Page d'administration </h1>

        <p>IP du serveur : </p>
        <?=
            // Connexion à la bdd
            // include('includes/bdd.php'); 

// Informations de connexion à la base de données
$host = "123.123.123.123";
$username = "username";
$password = "password";
$database = "FeeTathune";


// Connexion à la base de données
$conn = mysqli_connect($host, $username, $password, $database);


// Récupération des données de la table
$sql = "SELECT user_id, email, firstname, name, phone, gender, address, age FROM UTILISATEUR";
$result = mysqli_query($conn, $sql);

// Affichage des données dans un tableau HTML
echo '<table class="table table-bordered border-warning">';
echo '<thead class="thead-light">';
echo "<tr>";

// Affichage des noms des colonnes
while ($field = mysqli_fetch_field($result)) {
    echo '<th scope="col">' . $field->name . "</th>";
}

echo '</thead>';
echo "</tr>";
echo '<tbody>';

// Affichage des données de chaque ligne
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }

    echo "</tr>";
}
echo '</tbody>';
echo "</table>";

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
<br>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


    </main>
    <?php include('includes/footer.php'); ?>
    </body>
</html>

