$('.deleteBook').click( function(){
    var book = $(this).attr("data-nr");
    var id = $(this).attr(("data-id"));
    swal({
        title: 'Är du säker?',
        text: "Detta kommer att bort bokning - "+book+" !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ja, ta bort den!',
        cancelButtonText: 'Nej, gå tillabaka!'
    }).then(function () {
        window.location = "/admin/books/delete?book="+id;
    })
});

$('.verfBook').click( function(){
    var id = $(this).attr(("data-id"));
    swal({
        title: 'Är du säker?',
        text: "Denna åtgärd går ej att ångra",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ja, bektäfta bokning!',
        cancelButtonText: 'Nej, gå tillabaka!'
    }).then(function () {
        window.location = "/admin/books/edit/verf?bookID="+id;
    })
});