<?php session_start();
connect();
if (isset($_POST['login'])){
    $vardas= $_POST['vardas'];
    $trans = getUserByName($vardas);

    if($_POST['vardas'] == $trans['username'] && $_POST['slaptazodis']== $trans['password']){
        $_SESSION['vardas'] = "admin";
        header('Location:'.kelias.'?page=filmu-valdymas');
    }
    else{
        echo "prisijungimo duomenys neteisingi";    }
}
?>
<form method="post">
    <div class="form-group">
        <label for="vardas">User name</label>
        <input type="text" class="form-control" id="vardas" name="vardas" aria-describedby="vardas">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="slaptazodis" id="exampleInputPassword1">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>