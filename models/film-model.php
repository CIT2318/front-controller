<?php
// Model
function getConnection(){
	try{
       $conn = new PDO('mysql:host=localhost;dbname=u0123456', 'u0123456', '01jan96');
	}
	catch (PDOException $exception) 
	{
		echo "Oh no, there was a problem" . $exception->getMessage();
	}
	return $conn;
}
function closeConnection($conn)
{
	$conn=null;
}
function getAllFilms()
{
	$conn = getConnection();
	$query = "SELECT * FROM films";
	$resultset = $conn->query($query);
	$films = $resultset->fetchAll();
	closeConnection($conn);
	return $films;
}
function getFilmById($filmId)
{
	$conn = getConnection();
	$stmt = $conn->prepare("SELECT * FROM films WHERE films.id = :id");
	$stmt->bindValue(':id',$filmId);
	$stmt->execute();
	$film=$stmt->fetch();
	closeConnection($conn);
	return $film;
}



?>