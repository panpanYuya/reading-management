const bookDetailUrl = '/book/detail/'
$('.book').on('click',function(){

    let clickBook = $(this);
    let bookId = clickBook.find('.userBookId').val();
    window.location.href = bookDetailUrl + bookId;

});
