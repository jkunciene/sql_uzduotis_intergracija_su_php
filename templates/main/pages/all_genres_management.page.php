<?php
session_start();
if($_SESSION['vardas'] == "admin"):?>
<h2>visi filmai</h2>
<?php
    $zanrai =allGenre(); ?>
<div>
    <a class="btn btn-info" href="?page=naujas-zanras">Kurti nauja zanra</a> <br>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Zanro ID</td>
            <td>Zanro pavadinimas</td>
            <td>Salinti</td>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($zanrai as $zanras): ?>
        <tr>
            <td><?=$zanras['id']; ?></td>
            <td><?=$zanras['pavadinimas']; ?></td>
            <td><a href="?page=trinti-zanra&id=<?=$zanras['id']; ?>">Trinti</a></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>
<?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>