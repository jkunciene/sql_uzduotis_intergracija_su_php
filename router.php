<?php
if (isset($_GET['page'])){
    switch (htmlspecialchars($_GET['page'])){
        case 'visi':
            include ('templates/'.activeTemplate.'/pages/all_films.page.php');
            break;
        case 'zanrai':
            include ('templates/'.activeTemplate.'/pages/by_genre.page.php');
            break;
        case 'paieska':
            include ('templates/'.activeTemplate.'/pages/search.page.php');
            break;
        case 'filmu-valdymas':
            include ('templates/'.activeTemplate.'/pages/all_films_management.page.php');
            break;
        case 'zanru-valdymas':
            include ('templates/'.activeTemplate.'/pages/all_genres_management.page.php');
            break;
        case 'naujas-filmas':
            include ('templates/'.activeTemplate.'/pages/add_movie.page.php');
            break;
        case 'naujas-zanras':
            include ('templates/'.activeTemplate.'/pages/add_genre.page.php');
            break;
        case 'redaguoti-filmas':
            include ('templates/'.activeTemplate.'/pages/update_film.page.php');
            break;
        case 'trinti-filmas':
            include ('templates/'.activeTemplate.'/pages/delete_film.page.php');
            break;
        case 'trinti-zanra':
            include ('templates/'.activeTemplate.'/pages/delete_genre.page.php');
            break;
        case 'prisijungimas':
            include ('templates/'.activeTemplate.'/pages/login.page.php');
            break;
        case 'atsijungti':
            include ('templates/'.activeTemplate.'/pages/logout.page.php');
            break;
        default:
    }
} else {
    include ('templates/'.activeTemplate.'/pages/main_page.php');
}