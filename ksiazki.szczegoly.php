<?php

// jesli nie podano parametru id, przekieruj do listy książek
if(empty($_GET['id'])) {
    header("Location: ksiazki.lista.php");
    exit();
}

$id = (int)$_GET['id'];

include 'header.php';

use Ibd\Ksiazki;

$ksiazki = new Ksiazki();
$dane = $ksiazki->pobierz($id);
?>

<h2><?=$dane['tytul']?></h2>

<p>
	<a href="ksiazki.lista.php"><i class="fas fa-chevron-left"></i> Powrót</a>
    </br>
    <table>
        <tr>
            <?php if (!empty($dane['zdjecie'])) : ?>
                <img src="zdjecia/<?= $dane['zdjecie'] ?>" alt="<?= $dane['tytul'] ?>" class="rounded mx-auto d-block" width="50%" />
            <?php else : ?>
                brak zdjęcia
            <?php endif; ?>
        </tr>
        </br>
        <tr>
            <b>Tytuł:</b> <?= $dane['tytul'] ?>
        </tr>
        </br>
        <tr>
            <b>Opis:</b> <?= $dane['opis'] ?>
        </tr>
        </br>
        <tr>
            <b>Cena:</b> <?= $dane['cena'] ?>
            </tr>
        </br>
        <tr>
            <b>Liczba stron:</b> <?= $dane['liczba_stron'] ?>
        </tr>
        </br>
        <tr>
            <b>ISBN:</b> <?= $dane['isbn'] ?>
        </tr>
    </table>
        
</p>

<?php include 'footer.php'; ?>