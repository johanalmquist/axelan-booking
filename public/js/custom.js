$('.place').click( function(){
        var cellText = $(this).html();
        $('.bookPlace').val(cellText);
});



$('.placeBooked').click( function(){
    var nick = $(this).attr("data-nick");
    var bookedDate = $(this).attr("data-bookedDate");
    var place = $(this).attr("data-place");
    swal({
        title: "Plats "+place+" av bokad av "+nick,
        text: "För "+bookedDate+" sedan",
        type: "info"
    });
});

$('.mustLogIn').click( function(){
    swal({
        text: "För att kunna boka måste du logga in",
        type: "error"
    });
});

$('#deleteBook').click( function(){
    swal({
        title: 'Är du säker?',
        text: "Din bokning kommer att tas bort och platsen kommer att bli ledig",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ja, ta bort den!',
        cancelButtonText: 'Nej, gå tillabaka!'
    }).then(function () {
        window.location = "/book/delete";
    })
});

$('#deleteAccount').click( function(){
    swal({
        title: 'Är du säker?',
        text: "Detta kommer att ta bort ditt konto",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ja, ta bort mitt konto!',
        cancelButtonText: 'Nej, gå tillabaka!'
    }).then(function () {
        window.location = "/profile/delete";
    })
});


