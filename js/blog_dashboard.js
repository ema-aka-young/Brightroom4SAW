$(document).ready(function(){

    var dataTable = $('#blogdata').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"blog_fetch.php",
            type:"POST"
        }
    });

    $('#blogdata').on('draw.dt', function(){
        $('#blogdata').Tabledit({
            url:'blog_action.php',
            dataType:'json',
            columns:{
                identifier : [0, 'id'],
                editable:[[1, 'user_id'], [2, 'title'], [3, 'slug'], [4, 'image'], [5, 'published'], [6, 'created_at']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#' + data.id).remove();
                    $('#blogdata').DataTable().ajax.reload();
                }
            }
        });
    });

});