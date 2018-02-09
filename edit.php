<?php
require_once "models/film-model.php";
$filmId=$_GET['id']; 
$film = getFilmById($filmId);
require "views/edit-view.php";
?>
