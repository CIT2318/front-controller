<!DOCTYPE HTML>
<html>
<head>
<title>Film details</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="create.php">Create</a></li>
<li><a href="list.php">Read</a></li>
<li><a href="index.php?action=create">Create</a></li>
<li><a href="index.php?action=list">Read</a></li>
</ul>
<?php
if($film){
	echo "<h1>".$film['title']."</h1>";
	echo "<ul>";
	echo "<li>Year: ".$film['year']."</li>";
	echo "<li>Duration: ".$film['duration']."</li>";
	echo "</ul>";
}
?>
</body>
</html>
