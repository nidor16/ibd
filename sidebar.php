<?php

use Ibd\Ksiazki;

$ksiazki = new Ksiazki();
$lista = $ksiazki->pobierzBestsellery();
?>

<div class="col-md-2">
	<h1>Bestsellery</h1>
	
	<ul>
		<?php foreach ($lista as $ks) : ?>
			<li >
				<a href="ksiazki.szczegoly.php?id=<?= $ks['id'] ?>">
					<tr style="width: 100px">
						<?php if (!empty($ks['zdjecie'])) : ?>
							<img src="zdjecia/<?= $ks['zdjecie'] ?>" alt="<?= $ks['tytul'] ?> " class="img-thumbnail " />
						<?php else : ?>
							brak zdjęcia
						<?php endif; ?>
					</tr>
					<br />
					<b><tr><?= $ks['tytul'] ?></tr></b>
					<br />
					<tr><?= $ks['nazwisko'] ?> <?= $ks['imie'] ?></tr>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>