$('.deleteUser').click( function(){
    var nick = $(this).attr("data-nick");
    var user = $(this).attr("data-user");
    swal({
        title: 'Är du säker?',
        text: "Denna åtgärd kommer att bort denna användare - "+nick+"!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ja, ta bort den!',
        cancelButtonText: 'Nej, gå tillabaka!'
    }).then(function () {
        window.location = "/admin/users/delete?user="+user;
    })
});