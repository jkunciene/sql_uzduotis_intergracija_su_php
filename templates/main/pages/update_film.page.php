<?php
session_start();
if($_SESSION['vardas'] == "admin"):?>
<?php
connect();
$filmas = getFilmbyId($_GET['id']);

if (isset($_POST['submit'])){
      updateFilmById($_POST['id'], $_POST['pavadinimas'], $_POST['aprasymas'], $_POST['metai'], $_POST['rezisierius'], $_POST['ivertinimai'], $_POST['zanroId']);
    }
?>

<div class="container">
    <form method="post">
        <div class="form-group">
            <label for="id">Filmo id</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$filmas['id']; ?>">
        </div>
        <div class="form-group">
            <label for="pavadinimas">Filmo pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  value="<?=$filmas['pavadinimas']; ?>">
        </div>
        <div class="form-group">
            <label for="aprasymas">Aprasymas</label>
            <input type="text" class="form-control" id="aprasymas" name="aprasymas" value="<?=$filmas['aprasymas']; ?>">
        </div>
        <div class="form-group">
            <label for="metai">Filmo metai</label>
            <input type="text" class="form-control" id="metai" name="metai"  value="<?=$filmas['metai']; ?>">
        </div>
        <div class="form-group">
            <label for="rezisierius">Rezisierius</label>
            <input type="text" class="form-control" id="rezisierius" name="rezisierius" value="<?=$filmas['rezisierius']; ?>">
        </div>
        <div class="form-group">
            <label for="ivertinimai">Ivertinimai</label>
            <input type="text" class="form-control" id="ivertinimai" name="ivertinimai" value="<?=$filmas['imdb']; ?>">
        </div>

        <div class="form-group">
            <label for="zanras">Filmo zanras</label>
            <input type="text" class="form-control" id="zanras" name="zanras"  value="<?=$filmas['zanroPavadinimas']; ?>">
        </div>
        <div class="form-group">
            <label for="zanroId">Zanro id</label>
        <input type="text" class="form-control" id="zanroId"  name="zanroId" value="<?=$filmas['reikiamasId'];?>" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>