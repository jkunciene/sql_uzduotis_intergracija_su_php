<?php
//prisijungimas prie db
function connect()
{
    global $host, $db, $username, $password, $options;
    $dns = "mysql:host=$host;dbname=$db";
    try {
        $conn = new PDO($dns, $username, $password, $options);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
    return $conn;
}
//Parašyti SQL užklausą, kuri surastų, ar įvestas user vardas yra mūsų duomenų bazėje

function getUserByName($inputas){
    $conn = connect();
    try{
        if($conn){
            $stmt = $conn->prepare('');
            $stmt->bindValue(1,"%$inputas%", PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch();
        }}
    catch (PDOException $e) {
        echo $e->getMessage();
        exit;}

    return  $result;
}
//Parašyti SQL užklausą, kuri surastų, visus filmus + jų žanrus

function allFilms()
{
    $conn = connect();
    try {
        if ($conn) {
            $stmt = $conn->query("");
            $filmai = $stmt->fetchAll();
            $conn = null;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;}
           return $filmai;
}
//Parašyti SQL užklausą, kuri surastų, konkretų filmą pagal id

function getFilmbyId($kuri)
{
    $conn = connect();
    try {
        if ($conn) {
            $stmt = $conn->query(" = $kuri");
            $filmas = $stmt->fetch();
            $conn = null;
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $filmas;
}
//Parašyti SQL užklausą, kuri surastų, visus žanrus

function allGenre(){
    $conn = connect();
    try{
        if($conn){
            $stmt = $conn->query("");
            $filmuZanrai = $stmt->fetchAll();}}
    catch (PDOException $e) {
        echo $e->getMessage();
        exit;}
    return  $filmuZanrai;

}
//Parašyti SQL užklausą, kuri surastų, konkretų žanrą pagal ID

function getGenreById($kuri){
    $conn = connect();
    try{
        if($conn){
            $stmt = $conn->query(" = $kuri");
            $zanras = $stmt->fetch();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $zanras;

}
//Parašyti SQL užklausą, kuri surastų, filmus pagal žanrą

function byGenre($zanroId){
   // var_dump($zanroId);
    $conn = connect();
    try{
        if($conn){
                if (isset($zanroId)){
                   // var_dump($zanroId);
                $stmt = $conn->query("= $zanroId");
                $pagalzanra = $stmt->fetchAll();
               // var_dump($pagalzanra);
            }
    }
}catch (PDOException $e) {
        echo $e->getMessage();
        exit;}
        return $pagalzanra;
}
//autocompletui reikalinga funkcija
function filmsName(){
    $conn = connect();
    try{
        if($conn){
    $stmt = $conn->query("SELECT pavadinimas FROM filmaitable ");
    $filmai = $stmt->fetchAll();}}
        catch (PDOException $e) {
                echo $e->getMessage();
                exit;}
    return  $filmai;
}
//Parašyti SQL užklausą, kuri surastų, filmą pagal vartotojo įvestą paiešką

function filmSearch($inputas){
    $conn = connect();
    try{
            if($conn){
                    $uzklausa = $conn->prepare('');

                    $uzklausa->bindValue(1,"%$inputas%", PDO::PARAM_STR);
                    $uzklausa->execute();
                    $rezultatai = $uzklausa->fetchAll();

        }}
    catch (PDOException $e) {
            echo $e->getMessage();
            exit;}

        return $rezultatai;
}

//Parašyti SQL užklausą, kuri atsakingą už naujo žanro reikšmės įrašymą į duomenų bazės žanrų lentelę

function addGenre ($inputas){
    $conn = connect();
    try{
        $stmt= $conn->prepare("");
        $stmt->bindParam(':pavadinimas', $inputas, PDO::PARAM_STR);
        $stmt->execute();
        header('Location:'.kelias.'?page=zanru-valdymas');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        exit;}

}
//Parašyti SQL užklausą, kuri atsakingą už naujo filmo reikšmės įrašymą į duomenų bazės filmų lentelę

function addMovie($pavadinimas, $aprasymas, $metai, $rezisierius, $ivertinimai, $zanrasId){
    $conn = connect();
    try {
        $stmt= $conn->prepare( "");

        $stmt->bindParam(':pavadinimas', $pavadinimas, PDO::PARAM_STR);
        $stmt->bindParam(':aprasymas', $aprasymas, PDO::PARAM_STR);
        $stmt->bindParam(':metai', $metai, PDO::PARAM_STR);
        $stmt->bindParam(':rezisierius', $rezisierius, PDO::PARAM_STR);
        $stmt->bindParam(':imdb', $ivertinimai, PDO::PARAM_STR);
        $stmt->bindParam(':genre_id', $zanrasId, PDO::PARAM_STR);
        $stmt->execute();
        header('Location:'.kelias.'?page=filmu-valdymas');
    }
    catch (PDOException $e) {
        echo $e->getMessage();
        exit;}
}

//UPDATE FUNKCIJOS

//Parašyti SQL užklausą, kuri atsakinga už filmo duomenų atnaujinimą pagal gauta ID
function updateFilmById($kuri, $pavadinimas, $aprasymas, $metai, $rezisierius, $ivertinimas, $zanroId){
    $conn = connect();
    try {
        if ($conn){
            $stmt= $conn->prepare("= :id");
            $stmt->bindParam(':id', $kuri, PDO::PARAM_STR);
            $stmt->bindParam(':pavadinimas', $pavadinimas, PDO::PARAM_STR);
            $stmt->bindParam(':aprasymas', $aprasymas, PDO::PARAM_STR);
            $stmt->bindParam(':metai', $metai, PDO::PARAM_STR);
            $stmt->bindParam(':rezisierius', $rezisierius, PDO::PARAM_STR);
            $stmt->bindParam(':imdb', $ivertinimas, PDO::PARAM_STR);
            $stmt->bindParam(':genre_id', $zanroId, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.kelias.'?page=filmu-valdymas');
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
        exit;    }
}


//TRYNIMO IŠ DB FUNKCIJOS

//Parašyti SQL užklausą, kuri atsakinga už filmo ištrynimą iš duomenų bazės, pagal gautą ID

function deleteFilmById($kuri){
    $conn = connect();
        try {
            if ($conn){
                $stmt= $conn->prepare(" = :id");
                $stmt->bindParam(':id', $kuri, PDO::PARAM_STR);
                $stmt->execute();
                header('Location:'.kelias.'?page=filmu-valdymas');
            }
        } catch (PDOException $e){
            echo $e->getMessage();
            exit;    }
}
//Parašyti SQL užklausą, kuri atsakinga už žanro ištrynimą iš duomenų bazės, pagal gautą ID

function deleteGenreById($kuri){
    $conn = connect();
    try {
        if ($conn){
            $stmt= $conn->prepare("DELETE FROM zanrai               
                    WHERE id = :id");
            $stmt->bindParam(':id', $kuri, PDO::PARAM_STR);
            $stmt->execute();
            header('Location:'.kelias.'?page=zanru-valdymas');
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
        exit;    }
}
