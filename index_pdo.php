<?php

$bdd = new PDO(
	'mysql:host=localhost;dbname=mon_armoire;charset=utf8', 'root', 'simplonco');

$reponse = $bdd->query('SELECT * FROM mes_chaussettes');

?>

<table>
<?php while ($donnees = $reponse->fetch()) : ?>
		<tr>
			<td><?=$donnees['id']?></td>
			<td><?=$donnees['pointure']?></td>
			<td><?=$donnees['temp_lavage']?></td>
			<td><?=$donnees['description']?></td>
			<td><?=$donnees['couleur']?></td>
			<td><?=$donnees['date_lavage']?></td>
		</tr>
<?php endwhile; ?>
</table>

<?php $reponse->closeCursor(); ?>