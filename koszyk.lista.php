<?php
require_once 'vendor/autoload.php';

include 'header.php';

use Ibd\Ksiazki;
use Ibd\Koszyk;

$koszyk = new Koszyk();

if(isset($_POST['zmien'])) {
	$koszyk->zmienLiczbeSztuk($_POST['ilosci']);
	header("Location: koszyk.lista.php");
}

$listaKsiazek = $koszyk->pobierzWszystkie();
?>

<h2>Koszyk</h2>

<form method="post" action="">
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th>Tytuł</th>
				<th>Autor</th>
				<th>Kategoria</th>
				<th>Cena PLN</th>
				<th>Liczba sztuk</th>
				<th>Cena razem</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<?php if(count($listaKsiazek) > 0): ?>
			<tbody>
				<?php foreach($listaKsiazek as $ks): ?>
					<tr>
                        <td style="width: 100px">
							<?php if(!empty($ks['zdjecie'])): ?>
								<img src="zdjecia/<?= $ks['zdjecie'] ?>" alt="<?= $ks['tytul'] ?>" class="img-thumbnail" />
							<?php else: ?>
								brak zdjęcia
							<?php endif; ?>
						</td>
						<td><?= $ks['tytul'] ?></td>
						<td><?= $ks['nazwisko'] ?> <?= $ks['imie'] ?></td>
						<td><?= $ks['nazwa'] ?></td>
						<td><?= $ks['cena'] ?></td>
						<td>
							<div style="width: 50px">
								<input type="text" name="ilosci[<?= $ks['id_koszyka'] ?>]" value="<?= $ks['liczba_sztuk'] ?>" class="form-control" />
							</div>
						</td>
						<td><?= $ks['cena'] * $ks['liczba_sztuk'] ?></td>
						<td style="white-space: nowrap">
							<a href="koszyk.usun.php?id=<?=$ks['id'] ?>" title="usuń z koszyka" class="aUsunZKoszyka">
                                <i class="fas fa-trash"></i>
							</a>
							<a href="ksiazki.szczegoly.php?id=<?=$ks['id']?>" title="szczegóły">
                                <i class="fas fa-folder-open"></i>
                            </a>
						</td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td style="text-align: right"></td>
					<td style="text-align: right"></td>
					<td style="text-align: right"></td>
					<td style="text-align: right"></td>
					<td style="text-align: right"></td>
					<th style="text-align: right">Cena całkowita:</th>
					<td style="text-align: left"><?= $koszyk->pobierzCalkowitaCene(session_id()); ?></td>
					<td style="text-align: right"></td>
				</tr>
			</tbody>
            <tfoot>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="4" class="text-right">
                        <input type="submit" class="btn btn-secondary btn-sm" name="zmien" value="Zmień liczbę sztuk" />
                        <?php if (!empty($_SESSION['id_uzytkownika'])): ?>
                            <a href="zamowienie.php" class="btn btn-primary btn-sm">Złóż zamówienie</a>
                        <?php endif; ?>
                    </td>
                </tr>
            </tfoot>
		<?php else: ?>
			<tr><td colspan="8" style="text-align: center">Brak produktów w koszyku.</td></tr>
		<?php endif; ?>
	</table>
</form>

<?php include 'footer.php'; ?>