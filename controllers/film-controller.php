<?php

function listfilms(){
	$films = getAllFilms();
    require "views/list-view.php";
}


function details(){
	$filmId=$_GET['id']; 
    $film = getFilmById($filmId);
    require "views/details-view.php";
}

function create(){
	require "views/create-view.php";
}

function save(){
	//basic form processing
	$title=$_POST['title'];
	$year=$_POST['year'];
	$duration=$_POST['duration'];
	$msg="";

	if(saveFilm($title,$year,$duration)){
	    $msg="<p>Successfully added the details for ".$title."</p>";
	}else{
	    $msg="<p>There was a problem inserting the data.</p>";
	}

	require "views/save-view.php";
}

?>