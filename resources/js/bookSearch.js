let modalFlg = false;
//登録する本のステータス
const read = "1";
const readWish = "2";
const unread = "3";

$('.regist-button').on('click',function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    let modalBox = $(this).parent().parent().parent();
    let bookStatus = modalBox.find(".slider").children('input').val();
    if(bookStatus !== read && bookStatus !== readWish && bookStatus !== unread){
        bookStatus = unread;
    }
    let bookId = modalBox.find(".book-id").val();
    let formattedBookId = escapeHTML(bookId);

    $.ajax({
        type: 'POST',
        url: '/book/regist',
        data: {
            'bookStatus': bookStatus,
            'bookId': formattedBookId,
        }
    }).done((res)=>{
        //成功のメッセージ
        modalBox.find(".regist-book-box").css('display', 'none');
        modalBox.find(".modal-close").css('display', 'none');
        modalBox.find(".message-box").css('display', 'block');
        modalBox.find(".message-box").text(res.message);
        window.setTimeout(closeModal, 5000);
    }).fail((error)=>{
        //失敗のメッセージ
        modalBox.find(".regist-book-box").css('display', 'none');
        modalBox.find(".modal-close").css('display', 'none');
        modalBox.find(".message-box").css('display', 'block');
        modalBox.find(".message-box").text(error.message);
        modalBox.find(".message-box").css('color', 'red');
        window.setTimeout(closeModal, 5000);

    });

});

function escapeHTML(text){
    return text.replace(/&/g, '&lt;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, "&#x27;");
}


$('.result-book' ).on( "click", function(){
    if(!modalFlg){
        //モーダルに表示する要素を取得
        modalFlg = true;
        let resultBook = $(this);
        let bookCover = resultBook.find(".book-image").children('img').attr('src');
        let bookTitle = resultBook.find(".book-title").text();
        let bookAuthor = resultBook.find(".book-author").text();
        let bookId = resultBook.find(".book-id").val();

        openModal(bookCover, bookTitle, bookAuthor, bookId);
        modalResize();
    }
});

$('.modal-close' ).on( "click", function(){
    if(modalFlg){
        modalFlg = false;
        closeModal();
    }
});

//モーダルを表示する。
function openModal(bookCover, bookTitle, bookAuthor, bookId){

    let bookContent = $('.regist-book-box');
    bookContent.find(".modal-img").children('img').attr('src',bookCover);
    bookContent.find(".modal-title").text(bookTitle);
    bookContent.find(".modal-author").text(bookAuthor);
    bookContent.find(".book-id").val(bookId);

    $('#modal').find(".message-box").css('display', 'none');
    $('#modal').find(".modal-close").css('display', 'block');
    $('#modal').css('display', 'block');
    $('body').css('background', 'rgba(0, 0, 0, 0.5)');
    $('header').css('opacity', '0');
    $('#modal').find(".regist-book-box").css('display', 'block');
    $('.main').css('background', 'rgba(0, 0, 0, .5)');
    $('.search > input').css('background', 'rgba(0, 0, 0, .5)');
    $('.search > input').prop('disabled', true);
    $('.book-image > img').css('opacity', '0.5');
    $('#modal').find(".regist-book-box").css('display', 'block');

}

function closeModal() {
    $('#modal').find(".message-box").css('display', 'none');
    $('#modal').css('display', 'none');
    $('.main').css('background', '');
    $('.search > input').css('background', '');
    $('.search > input').prop('disabled', false);

    //暗くした要素を元にもどす処理
    $('body').css('background', '');
    $('header').css('opacity', '1');
    $('.header-wrapper').css('background-color', '#65eb8d');
    $('.book-image > img').css('opacity', '');
    $('.book-image > img').css('opacity', '');

    modalFlg = false;
};


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


//画面サイズが変わったときにモーダルを真ん中に持っていく処理
$(window).on('resize',function(){
    if(modalFlg){
        modalResize();
    }
});

