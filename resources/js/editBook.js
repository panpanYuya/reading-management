const READ = 1;
const PRIORTY = 2;
const UNREAD = 3;

loadStatus();


$(document).ready(function(){
  loadStatus();
});

function loadStatus(){
    let bookStatus = $('.book-status').val();
    changeStatusColorSelected(bookStatus);
}

function changeStatusColorSelected(bookStatus){
    $('.readed-box').css('background-color', '#fff');
    $('.high_priority-book-box').css('background-color', '#fff');
    $('.unread-box').css('background-color', '#fff');

    if(READ == bookStatus){
        $('.readed-box').css('background-color', '#F5AF0C');
    }
    if(PRIORTY == bookStatus){
        $('.high_priority-book-box').css('background-color', '#F5AF0C');
    }
    if(UNREAD == bookStatus){
        $('.unread-box').css('background-color', '#F5AF0C');
    }
}

$('.status-box').on('click', function(){
    let statusIconClass = $(this).children().children().attr('class');
    let bookStatus = $('.book-status').val();
    if(statusIconClass === 'read-icon' && bookStatus !== READ){
        changeStatus(READ);
    }
    if(statusIconClass === 'priority-book-icon' && bookStatus !== PRIORTY){
        changeStatus(PRIORTY);
    }
    if(statusIconClass === 'unread-icon' && bookStatus !== UNREAD){
        changeStatus(UNREAD);
    }
});


function changeStatus(bookStatus){
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: location.href + '/status/update',
        data: {
            'bookStatus': bookStatus,
        }
    }).done((res)=>{
        changeStatusColorSelected(res.updatedBookStatus);
    }).fail((error)=>{
        alert(error.responseJSON.message);
    });
}
