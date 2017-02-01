<?php
require __DIR__ . '/vendor/autoload.php';
//require_once 'idiorm.php';
ORM::configure('mysql:host=localhost;dbname=mon_armoire');
ORM::configure('username', 'root');
ORM::configure('password', 'simplonco');

$chaussettes = ORM::for_table('mes_chaussettes')
->find_many();
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


	<?php foreach ($chaussettes as $chaussette) : ?>

		<tr>
			<td><?= $chaussette->id ?></td>
			<td><?= $chaussette->couleur ?></td>
			<td><?= $chaussette->pointure ?></td>
			<td><?= $chaussette->temp_lavage ?></td>
			<td><?= $chaussette->description ?></td>
			<td><?= $chaussette->date_lavage ?></td>
		</tr>

	<?php endforeach; ?>
</table>