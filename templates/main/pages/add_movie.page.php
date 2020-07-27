<?php
session_start();
if($_SESSION['vardas'] == "admin"):?>
<?php
connect();
    $zanrai = allGenre();?>

<?php
$validation_errors=[];
if (isset($_POST['submit'])){
    if (!preg_match('/\w{1,30}$/',
        trim(htmlspecialchars($_POST['pavadinimas']))) ){
        $validation_errors[] = "pavadinimas negali virsyti 30 simboliu ir trumpesnis uz 1";
    } else {
        $_POST['pavadinimas'] = trim(htmlspecialchars( $_POST['pavadinimas']));
    }
    if (!preg_match('/[\w\s{50,1000}]/i',
        trim(htmlspecialchars($_POST['aprasymas'])))) {
        $validation_errors[] = "netinkamas aprasymo formatas";
    } else {
        $_POST['aprasymas'] = trim(htmlspecialchars($_POST['aprasymas']));
    }

    if (!preg_match('/\w{1,30}$/',
        trim(htmlspecialchars($_POST['rezisierius']))) ){
        $validation_errors[] = "pavadinimas negali virsyti 30 simboliu ir trumpesnis uz 1";
    } else {
        $_POST['rezisierius'] = trim(htmlspecialchars( $_POST['rezisierius']));
    }
    if (!preg_match('/\d\.\d/',
        trim(htmlspecialchars($_POST['ivertinimai'])))){
        $validation_errors[] = "ivertinimai - netinkamas formatas";
    } else {
        $_POST['ivertinimai'] = trim(htmlspecialchars($_POST['ivertinimai']));
    }

    addMovie($_POST['pavadinimas'], $_POST['aprasymas'], $_POST['metai'], $_POST['rezisierius'], $_POST['ivertinimai'], $_POST['zanras']);
}
?>
<?php
if($validation_errors) :?>
    <div class="errors">
        <ul>
            <?php foreach($validation_errors as $error) :?>
                <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>

        <div class="container">
<form method="post">
  <div class="form-group">
    <label for="pavadinimas">Filmo pavadinimas</label>
    <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  placeholder="Iveskite filmo pavadinima">
  </div>
  <div class="form-group">
    <label for="aprasymas">Aprasymas</label>
    <input type="text" class="form-control" id="aprasymas" name="aprasymas" placeholder="Iveskite filmo Aprasymas">
  </div>
    <div class="form-group ">
        <label for="metams">Metai</label>
        <select id="metams" class="form-control" name="metai">
            <option selected>pasirinkite...</option>

            <?php $metai=1996; ?>
            <?php for($i=0; $i<25; $i++) : ?>
                <option value="<?= $metai; ?>"><?= $metai; ?></option>
                <?php $metai++; ?>
            <?php endfor; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Rezisierius</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="rezisierius" placeholder="iverskite filmo rezisieriu">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Ivertinimai</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="ivertinimai" placeholder="iveskite filmo ivertinima">
    </div>

    <div class="form-group ">
        <label for="inputState">Zanras</label>
        <select id="inputState" class="form-control" name="zanras">
            <option selected>pasirinkite...</option>
            <?php
            foreach ($zanrai as $zanras): ?>
            <option  value="<?=$zanras['id']; ?>"><?= $zanras['pavadinimas']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>