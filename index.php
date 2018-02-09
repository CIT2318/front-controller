<?php
require_once("models/film-model.php");
require_once("controllers/film-controller.php");

if(isset($_GET["action"])){
    $action=$_GET['action'];
}else{
    $action="list";
}

if ($action==="list") {
    listfilms();
} else if ($action==="details" && isset($_GET['id'])) {
    details();
} else if ($action==="create") {
    create();
} else if ($action==="save") {
    save();
} else {
    require("views/404-view.php");
}

?>