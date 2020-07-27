<?php
session_start();
if($_SESSION['vardas'] == "admin"):
    ?>

<?php
    connect();
$validation_errors=[];
if (isset($_POST['submit'])){
    if (!preg_match('/\w{1,30}$/',
        trim(htmlspecialchars($_POST['pavadinimas']))) ){
        $validation_errors[] = "pavadinimas negali virsyti 30 simboliu ir trumpesnis uz 1";
    } else {
        $_POST['pavadinimas'] = trim(htmlspecialchars( $_POST['pavadinimas']));
        addGenre($_POST['pavadinimas']);}
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
            <label for="pavadinimas">Zanro pavadinimas</label>
            <input type="text" class="form-control" id="pavadinimas" name="pavadinimas"  placeholder="Iveskite zanro pavadinima">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>