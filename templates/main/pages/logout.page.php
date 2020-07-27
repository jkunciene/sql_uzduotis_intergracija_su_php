<?php
session_start();
if ($_SESSION['vardas'] =="admin"){session_destroy();}


header('Location:'.kelias.'?page=prisijungimas');