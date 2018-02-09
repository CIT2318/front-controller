<?php
require_once "models/film-model.php";
$films = getAllFilms();
require "views/list-view.php";
?>

