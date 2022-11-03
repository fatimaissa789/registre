$(document).ready(function() {
    $('#showMesg').on('show.bs.modal', function(e) {
        var objectmesg = $(e.relatedTarget).data('id');
        objectmesg = objectmesg.split(";");

        $('#mesgDe').html('Message de '+objectmesg[0]);
        $('#mesgVer').html('Message vers '+objectmesg[0]);
        $('#datemesg').html(objectmesg[1]);
        $('#heuremesg').html(objectmesg[2]);
        $('#bodymesg').html(objectmesg['3']);


    });
    $('#show').on('show.bs.modal', function(e) {
        var objectUser = $(e.relatedTarget).data('id');
        objectUser = objectUser.split(";");
        $('#username').html(objectUser[4]);
        $('#email').html(objectUser[2]);
        $('#role').html(objectUser[8]);
        $('#numerotele').html(objectUser[10]);
        $('#nation').html(objectUser[12]);
        $('#sexe').html(objectUser[14]);
    });


    $('#sendmesg').on('show.bs.modal', function(e) {
        var usernameandid = $(e.relatedTarget).data('id');
        var usernameandid = usernameandid.split(';');
        var id = usernameandid[0];
        var username = usernameandid[1];
        $('#usernamemesg').attr("value",username);
        $('#idusersendmessage').attr("value",id);

    });

    $('#repondre').on('show.bs.modal', function(e) {
        var usernameandid = $(e.relatedTarget).data('id');
        var usernameandid = usernameandid.split(';');
        var id = usernameandid[0];
        var username = usernameandid[1];
        $('#usernamerepondre').attr("value",username);
        $('#iduserrepondre').attr("value",id);
    });


    $('#rendreadmin').on('show.bs.modal', function(e) {
        var usernameandid = $(e.relatedTarget).data('id');
        var usernameandid = usernameandid.split(';');
        var id = usernameandid[0];
        var username = usernameandid[1];
        $('#formulerendreadmin').attr('action','rendreadmin/'+id);
        $('#divalert3').html("<span class='glyphicon glyphicon-user'> </span> vous voulez vraiment rendre l'utilisateur "+username+" administrateur");

    });

    $('#delete').on('show.bs.modal', function(e) {
        var usernameandid = $(e.relatedTarget).data('id');
        var usernameandid = usernameandid.split(';');
        var id = usernameandid[0];
        var username = usernameandid[1];
        $('#formulaireSus').attr('action','suspendue/'+id);
        $('#divalert').html("<span class='glyphicon glyphicon-warning-sign'> </span> vous voulez supprimer ou suspendue cet l'utilisateur "+username+" ?");

    });

    $('#debloquer').on('show.bs.modal', function(e) {
        var usernameandid = $(e.relatedTarget).data('id');
        var usernameandid = usernameandid.split(';');
        var id = usernameandid[0];
        var username = usernameandid[1];
        $('#formulairedeb').attr('action','debloquer/'+id);
        $('#divalert2').html("<span class='glyphicon glyphicon-ok-sign'> </span> vous voulez vraiment débloquer l'utilisateur "+username);

    });

    $( "#search" ).keyup(function() {
        $.ajax({url: "../search/searchuser/"+$('#search').val() ,
            success: function(result){
            $("#tableajax").html(result);
        }});
    });




});