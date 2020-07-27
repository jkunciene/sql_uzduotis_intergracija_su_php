<h2>visi filmai</h2>
<?php
connect();
$filmai = allFilms();
?>

<table class="table table-bordered">
    <thead>
    <tr>
        <td>Filmo pavadinimas</td>
        <td>Filmo aprasymas</td>
        <td>Filmo rezisierius</td>
        <td>Filmo sukurimo metai</td>
        <td>Filmo zanras</td>
    </tr>
    </thead>
    <tr>
        <?php
        foreach ($filmai as $filmas): ?>

    <tr>

    <td><?=$filmas['pavadinimas']; ?></td>
    <td><?=$filmas['aprasymas']; ?></td>
    <td><?=$filmas['rezisierius']; ?></td>
    <td><?=$filmas['metai']; ?></td>
        <td><?=$filmas['zanroPavadinimas']; ?></td>

    </tr>
    <?php endforeach; ?>
    </tr>
</table>
