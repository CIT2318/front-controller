# The Front Controller Design Pattern

A commonly used design pattern for web application is the *front controller* pattern. The idea of the front controller pattern is that all requests go through a single page, a front controller.

## Why do this?

Usually whenever a user requests a webpage we perform common tasks such as authentication, dealing with sessions and cookies, loading other files e.g. model files, validation functions etc. before executing a specific controller action. Creating a front controller means we can get rid of this duplicate code. As a simple example have a look at the following two example controllers, *list.php* and *details.php*. 

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
* Using the code in this repository as a starting point
* Open the *index.php* file and replace the code in this file with the following:

```php
require_once("models/film-model.php");

if(isset($_GET["action"])){
    $action=$_GET['action'];
}else{
    $action="list";
}


if ($action==="list") {
    $films=getAllFilms();
    $pageTitle="List all films";
    include("views/list-view.php");
} else if ($action==="details" && isset($_GET['id'])) {
    $filmId=$_GET['id'];
    $film=getFilmById($filmId);
    $pageTitle="Film details";
    include("views/details-view.php");
} else {
    include("views/404-view.php");
}


```

* Save the file.
* In a web browser enter the following url http://localhost/cit2318/front-controller/mvc-with-functions/index.php?action=list. You should see the list of films.
* See how we have moved the code from the controllers list.php and details.php into the front controller.
* Delete list.php and details.php. 
* What URL do you think you need to enter to view a film's details?
* Once you have got this to work, modify the list view so that the hyperlinks in list.php still work.
* If the user doesn't specify a valid action the view 404-view.php is included. Create this view and save it in the view folder.  


