const READ = 1;
const PRIORTY = 2;
const UNREAD = 3;
let modalFlg = false;

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


$('.delete_book-button').on('click', function(){
    if(!modalFlg){
        modalFlg = true;
        modalResize();
        $('body').css('background', 'rgba(0, 0, 0, 0.5)');
        $('header').css('opacity', '0');
        $('.status-container').css('opacity', '0.5');
        $('.book-image > img').css('opacity', '0.5');
        $('.shelf').css('opacity', '0.5');
        $('.delete').css('opacity', '0.5');
        $('#modal').css('display', 'block');
    }
});

$('.modal-close' ).on( "click", function(){
    if(modalFlg){
        modalFlg = false;
        modalResize();
        $('body').css('background', 'rgba(255, 255, 255, 1)');
        $('header').css('opacity', '1');
        $('.status-container').css('opacity', '1');
        $('.book-image > img').css('opacity', '');
        $('.shelf').css('opacity', '');
        $('.delete').css('opacity', '');
        $('#modal').css('display', 'none');
    }
});


//画面サイズが変わったときにモーダルを真ん中に持っていく処理
$(window).on('resize',function(){
    if(modalFlg){
        modalResize();
    }
});

//モーダルの位置を真ん中で固定する処理
function modalResize(){
    var w = $(window).width();
    var h = $(window).height();

    var cw = $("#modal").outerWidth();
    var ch = $("#modal").outerHeight();

    //取得した値をcssに追加する
    $("#modal").css({
        "left": ((w - cw)/2) + "px",
        "top": ((h - ch)/2) + "px"
    });
};

$('#deleteCheckBox').on('click',function(){
    let deleteForm = $(this).parent().parent().parent();
    let checkBox = deleteForm.find('#deleteCheckBox').prop('checked');
    let deleteButton = deleteForm.find('.common-button');

    if(checkBox){
        onChecked(deleteButton);
    } else {
        offChecked(deleteButton);
    }

})


function onChecked(deleteButton){
    deleteButton.prop("disabled", false);
    deleteButton.css('opacity', 1);
    deleteButton.css('background-color', '#eb7e35');
    deleteButton.css('color', '#fafafa');
}


function offChecked(deleteButton){
    deleteButton.prop("disabled", true);
    deleteButton.css('opacity', 0.5);
    deleteButton.css('background-color', '#d5d5d5');
    deleteButton.css('color', 'black');
}

