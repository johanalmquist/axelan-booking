function getTotalBooks() {
    $('#totalBooks').load('/api/admin/count/books/total', function () {
    });
}

function getTotalBooksVerf() {
    $('#totalBooksVerf').load('/api/admin/count/books/total/verf', function () {
    });
}


function getTotalBooksNoVerf() {
    $('#totalBooksNoVerf').load('/api/admin/count/books/total/verf/no', function () {
    });
}

function getTotalUsers() {
    $('#totalUsers').load('/api/admin/count/users/total', function () {
    });
}


getTotalBooks();
getTotalBooksVerf();
getTotalBooksNoVerf();
getTotalUsers();
setInterval(function () {
   getTotalBooks();
   getTotalBooksVerf();
   getTotalBooksNoVerf();
    getTotalUsers();
}, 5000);


