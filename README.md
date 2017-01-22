#Creating a Front Controller

* You should have a films table in your database already. If you don't, import films.sql.
* Modify film-model.php so that the database connection uses your settings.
* Put the files on a server and check it works.

A commonly used design pattern for web application is the 'front controller' pattern. The idea of the front controller pattern is that all requests go through a single page, a front controller.

##Why do this?

Usually whenever a users requests a webpage we perform common tasks such as authentication, dealing with sessions and cookies, loading other files e.g. model files, before executing a specific action. Creating a front controller means we can get rid of this duplicate code. As a simple example have a look at the two controllers, *list.php* and *details.php*.

###list.php
```php
require_once("models/film-model.php");
$films=getAllFilms();
$pageTitle="List all films";
include("views/list-view.php");
```

###details.php
```php
require_once("models/film-model.php");
$filmId=$_GET['id'];
$film=getFilmById($filmId);
$pageTitle="Film details";
include("views/details-view.php");
```

An obvious bit of duplicate code is the require_once statement. If we had a more complex application e.g. with login code to check for session data, we would have a lot more duplication. 

##A front controller
Create a new php file, save it as index.php, in the same directory as list.php and details.php.

Add the following code:

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


