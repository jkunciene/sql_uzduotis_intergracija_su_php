<?php
session_start();
if($_SESSION['vardas'] == "admin"):?>

<h2>visi filmai</h2>
<?php
$filmai=allFilms();?>
<div>
    <a class="btn btn-info" href="?page=naujas-filmas">Kurti nauja filma</a>
    <br>
    <br>
<table class="table table-bordered">
    <thead>
    <tr>
        <td>Filmo zanras</td>
        <td>Filmo pavadinimas</td>
        <td>Filmo aprasymas</td>
        <td>Filmo rezisierius</td>
        <td>Filmo sukurimo metai</td>
        <td>Redaguoti Filma</td>
        <td>Trinti filma</td>
    </tr>
    </thead>
    <tr>
        <?php
        foreach ($filmai as $filmas): ?>
    <tr>
        <td><?=$filmas['zanroPavadinimas']; ?></td>
        <td><?=$filmas['pavadinimas']; ?></td>
        <td><?=$filmas['aprasymas']; ?></td>
        <td><?=$filmas['rezisierius']; ?></td>
        <td><?=$filmas['metai']; ?></td>

        <td><a href="?page=redaguoti-filmas&id=<?=$filmas['id']; ?>">Redaguoti</a></td>
        <td><a href="?page=trinti-filmas&id=<?=$filmas['id']; ?>">Trinti</a></td>
    </tr>
    <?php endforeach; ?>
    </tr>
</table>
</div>
    <?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>