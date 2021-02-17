$(document).ready(function(){
  load_data();
  function load_data(page)
  {
   $.ajax({
    url:"/~S4668271/private/blog_get_posts.php",
    method:"POST",
    data:{page:page},
    success:function(data){
     $('#post_single').html(data);
 }
})
}
$(document).on('click', '.pagination_link', function(){
   var page = $(this).attr("id");
   load_data(page);

});
});