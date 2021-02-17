<?php

include '../../db_conn.php';

if($_SERVER['REQUEST_METHOD'] != 'POST'){
   die( header( 'Location: ../403.php' ));
}


$record_per_page = 6;
$page = '';
$output = '';
if(isset($_POST["page"]))
{
 $page = $_POST["page"];
}
else
{
 $page = 1;
}
$start_from = ($page - 1)*$record_per_page;
$query = "SELECT * FROM posts WHERE published=true ORDER BY created_at DESC LIMIT $start_from, $record_per_page";
$result = mysqli_query($con, $query);
$output = '<div class="row hidden-md-up">';
while($post = mysqli_fetch_array($result))
{
 $output .= '
 <div class="col-xl-4 col-md-6 col-xs-12" >
 <div class="post">
 <a href="/~S4668271/blog/blog_post.php?post-slug='.$post['slug'].'">
 <img src="/~S4668271/images/'.$post['image'].'" class="post_image" alt="">
 <div class="post_info">
 <h3>'.$post['title'].'</h3>
 <div class="info">
 <span>'.date("F j, Y ", strtotime($post["created_at"])).'</span>
 <span class="read_more">Read more...</span>
 </div>
 </div>
 </a>
 </div>
 </div>';
}
$output .= '</div> <div align="center">';
$page_query = "SELECT * FROM posts WHERE published=true ORDER BY created_at DESC";
$page_result = mysqli_query($con, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record_per_page);
for($i=1; $i<=$total_pages; $i++)
{
 $output .= "<span onclick=\"topFunction()\" class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";
}
$output .= '</div>';
echo $output;



?>
