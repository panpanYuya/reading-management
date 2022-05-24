//モーダル表示のflg
let modalFlg = false;

//付箋追加ボタン押下の処理
$('.sticky_add-button > img').on('click',function(){
    modalResize();
    openModal();
});


//付箋編集ボタン押下の処理
$('.sticky-edit_button > img').on('click',function(){
    let editSticky = $(this).parent().parent().parent();
    modalResize();
    openModal();
    editModal(editSticky);
});

//モーダルを閉じるボタンが押下された時の処理
$('.modal-close' ).on( "click", function(){
    if(modalFlg){
        modalFlg = false;
        closeModal();
    }
});

//モーダルを表示する。
function openModal(){
    if(!modalFlg){
        modalFlg = true;
        //モーダルの中身を切り替える。
        $('#modal').find(".message-box").css('display', 'none');
        $('#modal').find(".modal-close").css('display', 'block');
        $('#modal').css('display', 'block');

        //モーダル以外を暗くする処理
        $('body').css('background', 'rgba(0, 0, 0, .5)');
        $('header').css('opacity', '0');
        $('.menu-btn').css('display', 'none');
        $('.book-image > img').css('opacity', '0.5');
        $('.sticky_note').css('opacity', '0.3');

        //モーダルを表示する処理
        $('#modal').find('.sticky-note-box').css('display', 'block');
        let userBookId = $('.details-right').children('input').val();
        $('#modal').find('.user_book_id').val(userBookId);
        $('.site-header').css('z-index', '1');
    }

};

//編集する付箋の値をモーダルに表示する。
function editModal(editSticky){
    //編集したい付箋を取得する。
    let bookPage = editSticky.find('.book-page').text();
    let stickyTitle = editSticky.find('.sticky_title').text();
    let stickyMemo = editSticky.find('.sticky_content').text();
    let stickyId = editSticky.find('.sticky_id').val();

    let formattedBookPage = bookPage.substr(1,bookPage.length);

    $('#modal').find(".sticky-page").children('input').val(formattedBookPage);
    $('#modal').find(".sticky-title").children('input').val(stickyTitle);
    $('#modal').find(".sticky-memo").children('textarea').val(stickyMemo);
    $('#modal').find(".sticky_id").val(stickyId);

};

//モーダルを閉じる処理
function closeModal() {
    //モーダルを隠す処理
    $('#modal').find(".message-box").css('display', 'none');
    $('#modal').css('display', 'none');

    //暗くした要素を元にもどす処理
    $('body').css('background', '');
    $('header').css('opacity', '1');
    $('.menu-btn').css('display', 'block');
    $('.header-wrapper').css('background-color', '#65eb8d');
    $('.sticky_note').css('opacity', '');
    $('.book-image > img').css('opacity', '');

    modalFlg = false;
};

//画面サイズが変わったときにモーダルを真ん中に持っていく処理
$(window).on('resize',function(){
    if(modalFlg){
        modalResize();
    }
});

//XSS対策の処理
function escapeHTML(text){
    return text.replace(/&/g, '&lt;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, "&#x27;");
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


$('.sticky-regist-button').on('click',function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    let modalBox = $(this).parent().parent();
    let bookPage = modalBox.find(".sticky-page").children('input').val();
    let stickyTitle = modalBox.find(".sticky-title").children('input').val();
    let stickyMemo = modalBox.find(".sticky-memo").children('textarea').val();
    let stickyId = modalBox.find(".sticky_id").val();

    let userBookId = modalBox.find(".user_book_id").val();
    let formattedId = escapeHTML(userBookId);

    let splitText = stickyMemo.split('\n');
    let formattedMemo = splitText.join('<br>');

    let urlString = "";
    if(!stickyId){
        urlString = '/book/sticky/add';
    } else{
        urlString = '/book/sticky/update';
    }

    $.ajax({
        type: 'POST',
        url: urlString,
        data: {
            'userBookId': formattedId,
            'stickyId': stickyId,
            'pageNumber': bookPage,
            'stickyTitle': stickyTitle,
            'stickyMemo': formattedMemo,
        }
    }).done(()=>{
        let bookId = modalBox.find('.user_book_id"').val();
        window.location.href = bookDetailUrl + bookId;
        window.location.href ="/book/detail";
    }).fail((error)=>{
        //失敗のメッセージ
        modalBox.find(".sticky-note-box").css('display', 'none');
        modalBox.find(".modal-close").css('display', 'none');
        modalBox.find(".message-box").css('display', 'block');
        modalBox.find(".message-box").text(error.responseJSON.message);
        modalBox.find(".message-box").css('color', 'red');
        window.setTimeout(closeModal, 5000);

    });

});


