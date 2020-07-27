<?php
session_start();
if($_SESSION['vardas'] == "admin"):?>
<?php
connect();
$zanras = getGenreById($_GET['id']);
if (isset($_POST['submit'])) {
    deleteGenreById($_POST['id']);
}

?>
<div class="container">
    <form method="post">
        <label class="text-danger display-4" for="klausimas">Are you sure you want to delete?</label>
        <div class="form-group">
            <label for="id">Filmo id</label>
            <input type="text" class="form-control" id="id" name="id"  value="<?=$zanras['id']; ?>">
        </div>
        <div class="form-group">
            <label for="zanras">Filmo zanras</label>
            <input type="text" class="form-control" id="zanras" name="zanras"  value="<?=$zanras['pavadinimas']; ?>">
        </div>
        <div class="form-group">
            <a href="?page=zanru-valdymas" class="btn btn-success">Cancel</a>
            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
</div>
<?php else:?>
    <?php header('Location:'.kelias.'?page=prisijungimas'); ?>
<?php endif;?>