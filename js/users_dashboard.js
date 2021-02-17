$(document).ready(function(){

    var dataTable = $('#usersdata').DataTable({
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "ajax" : {
            url:"users_fetch.php",
            type:"POST"
        }
    });

    $('#usersdata').on('draw.dt', function(){
        $('#usersdata').Tabledit({
            url:'users_action.php',
            dataType:'json',
            columns:{
                identifier : [0, 'id'],
                editable:[[1, 'nome'], [2, 'cognome'], [3, 'email'], [4, 'role', '{"1":"Author","2":"Admin","3":"User"}']]
            },
            restoreButton:false,
            onSuccess:function(data, textStatus, jqXHR)
            {
                if(data.action == 'delete')
                {
                    $('#' + data.id).remove();
                    $('#usersdata').DataTable().ajax.reload();
                }
            }
        });
    });

});