# The Front Controller Design Pattern

A commonly used design pattern for web application is the *front controller* pattern. The idea of the front controller pattern is that all requests go through a single page, a front controller.

## Why do this?
Usually whenever a user requests a webpage we perform common tasks such as authentication, dealing with sessions and cookies, loading other files e.g. model files, validation functions before executing a specific controller action. Creating a front controller means we can get rid of this duplicate code. As a simple example have a look at the following two example controllers, *list.php* and *details.php*. 

### list.php
```php
<?php
session_start();
require_once "models/film-model.php";
require_once "lib/auth-fncs.php";

if(!isLoggedIn())
{
    //user tried to access the page without logging in
    header( "Location: login.php" );
};

$films = getAllFilms();
require "views/list-view.php";
?>
```

### details.php
```php
<?php
session_start();
require_once "models/film-model.php";
require_once "lib/auth-fncs.php";

if(!isLoggedIn())
{
    //user tried to access the page without logging in
    header( "Location: login.php" );
};
$filmId=$_GET['id']; 
$film = getFilmById($filmId);
require "views/details-view.php";
?>
```

It is fairly obvious that there is a lot of duplicate code in the two controllers. The *front controller* pattern is a solution to this problem. 

## Creating a front controller
* Use the code in this repository as a starting point (it is a simplified version of the MVC example we have been looking at in recent weeks)
* Open the *index.php* file and replace the code in this file with the following:

```php
<?php
require_once("models/film-model.php");
require_once("controllers/film-controller.php");

if(isset($_GET["action"])){
    $action=$_GET['action'];
}else{
    $action="list";
}


if ($action==="list") {
    $films = getAllFilms();
    require "views/list-view.php";
} else if ($action==="details" && isset($_GET['id'])) {
    $filmId=$_GET['id']; 
    $film = getFilmById($filmId);
    require "views/details-view.php";
} else {
    require("views/404-view.php");
}
?>
```

* Save the file.
* In a web browser enter the following url *index.php?action=list*. You should see the list of films.
* See how we have moved the code from the controllers *list.php* and *details.php* into the front controller.
* Delete *list.php* and *details.php*. 
* What URL do you think you need to enter to view a film's details?
* Once you have got this to work, modify the list view so that the hyperlinks in *list-view.php* still work.
* If the user doesn't specify a valid action e.g. *index.php?action=delete*  the view *404-view.php* is included. Create this view, save it in the *view* folder and check this works.  

## Creating a film controller
We could carry on with this and move the code from *delete*, *create*, *edit* controllers etc. into *index.php*. The problem then is that *index.php* then becomes a big, complex, hard to maintain file. 
* An improvement would be a film controller file. 
* Create a new php file and add the following code:
```php
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
?>
```
* Save this file in a folder called *controllers* with a name of *film-controller.php*.
* Modify *index.php* so that it calls functions from *film-controller.php* i.e.

```php
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
} else {
    require("views/404-view.php");
}

?>
```
* Test this works

## On your own
* Think how you can implement the *create* functionality using the front controller pattern. Your *index.php* file will look something like:

```php
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
```
* You will need to 
    * Add functions in the *film-controller.php* file, *create()* and *save()*.
    * Modify *create-view.php* to submit the form data to *index.php*.
    * Again, once this works you, should be able to delete the *create.php* and *save.php* files.