<?php
connect();
$filmai =filmsName();
if (isset($_POST['search'])){
        $inputas = $_POST['pavadinimas'];
    $rezultatai = filmSearch($inputas);}

 ?>
<div class="container m-5">
<form method="post">
    <div class="form-group">
                <label for="pavadinimas">Iveskite, kokio filmo ieskote</label>
        <input type="text" class="form-control" id="pavadinimas" name="pavadinimas" list="saltinis" autocomplete="off">
        <datalist id="saltinis">
            <?php foreach ($filmai as $filmas): ?>
            <option value="<?=$filmas['pavadinimas']; ?>">
                <?php endforeach; ?>
        </datalist>
    </div>
    <button name="search" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<div class="container m-5">
<?php if (isset($_POST['pavadinimas'])): ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Filmo pavadinimas</td>
            <td>Filmo aprasymas</td>
            <td>Filmo rezisierius</td>
            <td>Filmo sukurimo metai</td>
            <td>Filmo kategorija</td>
        </tr>
        </thead>
        <tr>
            <?php
            foreach ($rezultatai as $irasas): ?>
        <tr>
            <td><?=$irasas['pavadinimas']; ?></td>
            <td><?=$irasas['aprasymas']; ?></td>
            <td><?=$irasas['rezisierius']; ?></td>
            <td><?=$irasas['metai']; ?></td>
            <td><?=$irasas['kategorija']; ?></td>
        </tr>
        <?php endforeach; ?>
        </tr>
    </table>

    <?php endif; ?>
</div>
