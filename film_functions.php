<?php
/* * * * * * * * * * * * * * *
* Returns all published films
* * * * * * * * * * * * * * */
function getPublishedFilms() {
	// use global $con object in function
	global $con;
	$sql = "SELECT * FROM film WHERE published=true";
	$result = mysqli_query($con, $sql);

	// fetch all posts as an associative array called $films
	$films = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $films;
}


/* * * * * * * * * * * * * * *
Search all film starting from a parameter
* * * * * * * * * * * * * * */
function SearchFilms($search) {
	// use global $con object in function
	global $con;
	$sql = "SELECT * FROM film WHERE published=true AND title LIKE '%$search%' ";
	$result = mysqli_query($con, $sql);
	if(!$result) return "";
	// fetch all film as an associative array called $films
	$films = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $films;
}


/* * * * * * * * * * * * * * *
* Receives a film id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getFilmTopic($film_id){
	global $con;
	$sql = "SELECT * FROM film WHERE id=
			(SELECT filmtopic_id FROM film_topic WHERE film_id=$film_id) LIMIT 1";
	$result = mysqli_query($con, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

/* * * * * * * * * * * * * * * *
* Returns all films under a topic
* * * * * * * * * * * * * * * * */
function getPublishedFilmsByTopic($filmtopic_id) {
	global $con;
	$sql = "SELECT * FROM film fs
			WHERE fs.id IN
			(SELECT ft.film_id FROM film_topic ft
				WHERE ft.filmtopic_id=$filmtopic_id GROUP BY ft.film_id
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($con, $sql);
	// fetch all films as an associative array called $films
	$films = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_films = array();
	foreach ($films as $film) {
		$film['topic'] = getFilmTopic($film['id']);
		array_push($final_films, $film);
	}
	return $final_films;
}
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $con;
	$sql = "SELECT name FROM filmtopics WHERE id=$id";
	$result = mysqli_query($con, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

/* * * * * * * * * * * * * * *
* Returns a single film
* * * * * * * * * * * * * * */
function getFilm($slug){
	global $con;
	$sql = "SELECT * FROM film WHERE slug='$slug' AND published=true";
	$result = mysqli_query($con, $sql);

	// fetch query results as associative array.
	$film = mysqli_fetch_assoc($result);
	if ($film) {
		// get the topic to which this film belongs
		$film['topic'] = getFilmTopic($film['id']);
	}
	return $film;
}

/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllTopics()
{
	global $con;
	$sql = "SELECT * FROM filmtopics";
	$result = mysqli_query($con, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
?>
