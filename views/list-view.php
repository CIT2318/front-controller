
<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="index.php?action=create">Create</a></li>
<li><a href="index.php?action=list">Read</a></li>
</ul>
<?php
//loop over the array of films
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='index.php?action=details&id=".$film["id"]."'>";
    echo $film["title"];
    echo "</a>";
    echo "</p>";
}
?>
</body>
</html>

