const bookDetailUrl = '/book/detail/'
$('.book').on('click',function(){

    let clickBook = $(this);
    let bookId = clickBook.children('input').val;
    window.location.href = bookDetailUrl + bookId;

});
