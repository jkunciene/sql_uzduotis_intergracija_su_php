<?php
connect();
$filmuZanrai = allGenre();
?>
    <h2>Filmai pagal zanra</h2>

<?php
foreach ($filmuZanrai as $zanras): ?>

    <ul class="list-group">
        <li class="list-group-item"><a href="?page=zanrai&id=<?= $zanras['id']; ?>"><?= $zanras['pavadinimas']; ?></a>
        </li>
    </ul>
<?php endforeach; ?>
<?php if (isset($_GET['id'])): ?>
    <?php $zanroId = $_GET['id'];
            $pagalzanra = byGenre($zanroId); ?>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Filmo zanras</td>
            <td>Filmo pavadinimas</td>
            <td>Filmo aprasymas</td>
            <td>Filmo rezisierius</td>
            <td>Filmo sukurimo metai</td>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($pagalzanra as $pglzanra): ?>
        <tr>
            <td><?= $pglzanra['zanroPavadinimas']; ?></td>
            <td><?= $pglzanra['pavadinimas']; ?></td>
            <td><?= $pglzanra['aprasymas']; ?></td>
            <td><?= $pglzanra['rezisierius']; ?></td>
            <td><?= $pglzanra['metai']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
<?php endif; ?>