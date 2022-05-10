const { find } = require("lodash");

let modalFlg = false;

// $('#search-keyword').keypress( function ( e ) {
//     // ここに処理を書く
//     $(function(){
//         $.ajaxSetup({
//             headers: {
//                 "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//             },
//         });
//         const keyword = $('[name="search-keyword"]').val();
//         $.ajax({
//             type: "post", //HTTP通信の種類
//             url:'/book/search', //通信したいURL
//             dataType: 'json',
//                 data: {
//                 keyword: keyword,
//             },
//         })
//         //通信が成功したとき
//         .done((res)=>{
//             console.log(res.message)
//         })
//         //通信が失敗したとき
//         .fail((error)=>{
//             console.log(error.statusText)
//         })
//     });
//     // スマホのキーボードを閉じる
//     $("#search-keyword").blur();
//     return false;
// });



$('.result-book' ).on( "click", function(){
    if(!modalFlg){
        //モーダルに表示する要素を取得
        modalFlg = true;
        let resultBook = $(this);
        let bookCover = resultBook.find(".book-image").children('img').attr('src');
        let bookTitle = resultBook.find(".book-title").text();
        let bookAuthor = resultBook.find(".book-author").text();

        openModal(bookCover, bookTitle, bookAuthor);
    }
});

//モーダルを表示する。
function openModal(bookCover, bookTitle, bookAuthor){

    let modal = $('#modal');
    modal.find(".modal-img").children('img').attr('src',bookCover);
    modal.find(".modal-title").text(bookTitle);
    modal.find(".modal-author").text(bookAuthor);

    $('#modal').css('display', 'block');
    $('.main').css('background', 'rgba(0, 0, 0, .5)');
    $('.search > input').css('background', 'rgba(0, 0, 0, .5)');

}


// #modal display:none
// main backgroudを付けるbackground: rgba(0, 0, 0, .5);
// .search > input   background: rgba(0, 0, 0, .5);を付ける
