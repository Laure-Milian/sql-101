<?php

$bdd = new PDO(
	'mysql:host=localhost;dbname=mon_armoire;charset=utf8', 'root', 'simplonco');

// $reponse = $bdd->query('SELECT * FROM mes_chaussettes');

// $req2 = $bdd->prepare('
// 	INSERT INTO mes_chaussettes(couleur, pointure, temp_lavage, description, date_lavage)
// 	VALUES (:couleur, :pointure, :temp_lavage, :description, :date_lavage)'
// );

// $req2->execute(array(
// 	'couleur' => 'rouge',
// 	'pointure' => 44,
// 	'temp_lavage' => 60,
// 	'description' => 'jolie chaussette',
// 	'date_lavage' => '2014-01-01'
// 	));

$req = $bdd->prepare(
	'SELECT * FROM mes_chaussettes WHERE couleur = :couleur AND pointure > :pointure');

$req->execute(
	array('couleur' => $_GET['couleur'],
	'pointure' => $_GET['pointure'])
);


?>

<table>
<tr>
	<th>Id</th>
	<th>Couleur</th>
	<th>Pointure</th>
	<th>Temp_lavage</th>
	<th>Description</th>
	<th>Date_lavage</th>
</tr>
<?php while ($donnees = $req->fetch()) : ?>
		<tr>
			<td><?=$donnees['id']?></td>
			<td><?=$donnees['couleur']?></td>
			<td><?=$donnees['pointure']?></td>
			<td><?=$donnees['temp_lavage']?></td>
			<td><?=$donnees['description']?></td>
			<td><?=$donnees['date_lavage']?></td>
		</tr>
<?php endwhile; ?>
</table>

<?php $req->closeCursor(); ?>