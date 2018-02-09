<?php
require_once "models/film-model.php";

//This is a simple example we would normally do some form validation here

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
?>
