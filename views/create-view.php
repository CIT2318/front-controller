<!DOCTYPE HTML>
<html>
<head>
<title>Add new film</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<ul>
<li><a href="index.php?action=create">Create</a></li>
<li><a href="index.php?action=list">Read</a></li>
</ul>
<h1>Add a new film</h1>
<form action="index.php?action=save" method="post">
<label for="title">Title:</label>
<input type="text" id="title" name="title">
<label for="year">Year:</label>
<input type="text" id="year" name="year">

<label for="duration">Duration:</label>
<input type="text" id="duration" name="duration">
<input type="submit" name="submitBtn" value="Add Film">
</form>

</body>
</html>