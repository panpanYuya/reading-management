const BOOKDETAILURL = '/book/detail/';
const DEFAULTSTATUS = 0;
const READSTATUS = 1;
const PRIORITYSTATUS = 2;
const UNREADSTATUS = 3;



$('.book').on('click',function(){

    let clickBook = $(this);
    let bookId = clickBook.find('.userBookId').val();
    window.location.href = BOOKDETAILURL + bookId;

});



$(document).ready(function(){
    delayButton();
});

function delayButton(){
   let bookListUrl =  $(location).attr('pathname');
   let statusCode = bookListUrl.slice(-1)
   if(statusCode == DEFAULTSTATUS){
    $('.regist_date').css('display','none');
}
if(statusCode == READSTATUS){
       $('.read_status').css('display','none');
    }
    if(statusCode == PRIORITYSTATUS){
       $('.read-wish_status').css('display','none');
    }
    if(statusCode == UNREADSTATUS){
       $('.unread_status').css('display','none');
   }
}
