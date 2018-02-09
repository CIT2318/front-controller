
<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="create.php">Create</a></li>
<li><a href="list.php">Read</a></li>
<li><a href="edit-list.php">Update</a></li>
<li><a href="delete-list.php">Delete</a></li>
</ul>
<?php
//loop over the array of films
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='details.php?id=".$film["id"]."'>";
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}
?>
</body>
</html>

