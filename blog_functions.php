<?php

/* * * * * * * * * * * * * * *
* Returns all published posts
* * * * * * * * * * * * * * */
function getPublishedPosts() {
	// use global $con object in function
	global $con;
	$sql = "SELECT * FROM posts WHERE published=true ORDER BY created_at DESC";
	$result = mysqli_query($con, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

/* * * * * * * * * * * * * * *
Search all posts starting from a parametr
* * * * * * * * * * * * * * */
function SearchPost($search) {
	// use global $con object in function
	global $con;

	$sql = "SELECT * FROM posts WHERE published=true AND title LIKE '%$search%' ";
	$result = mysqli_query($con, $sql);
	if(!$result) return "";

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
}

/* * * * * * * * * * * * * * *
* Receives a post id and
* Returns topic of the post
* * * * * * * * * * * * * * */
function getPostTopic($post_id){
	global $con;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($con, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}

/* * * * * * * * * * * * * * * *
* Returns all posts under a topic
* * * * * * * * * * * * * * * * */
function getPublishedPostsByTopic($topic_id) {
	global $con;
	$sql = "SELECT * FROM posts ps
			WHERE ps.id IN
			(SELECT pt.post_id FROM post_topic pt
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id
				HAVING COUNT(1) = 1) AND published=true ORDER BY created_at DESC";
	$result = mysqli_query($con, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
/* * * * * * * * * * * * * * * *
* Returns topic name by topic id
* * * * * * * * * * * * * * * * */
function getTopicNameById($id)
{
	global $con;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($con, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}

/* * * * * * * * * * * * * * * *
* Returns topic id by topic name
* * * * * * * * * * * * * * * * */
function getTopicIdByName($name)
{
	global $con;
	$sql = "SELECT id FROM topics WHERE name='$name'";
	$result = mysqli_query($con, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['id'];
}

/* * * * * * * * * * * * * * *
* Returns a single post
* * * * * * * * * * * * * * */
function getPost($slug){
	global $con;
	$sql = "SELECT * FROM posts WHERE slug='$slug' AND published=true";
	$result = mysqli_query($con, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	}
	return $post;
}

/* * * * * * * * * * * *
*  Returns all topics
* * * * * * * * * * * * */
function getAllPostTopics()
{
	global $con;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($con, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}

/* * * * * * * * * * * * * *  * * *
*  Returns all topics from a user
* * * * * * * * * * * * * * * *  */
function getAllPostTopicsFromUser($user_id)
{
	global $con;
	$sql = "SELECT * FROM posts WHERE user_id=$user_id AND published=true";
	$result = mysqli_query($con, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}

?>
