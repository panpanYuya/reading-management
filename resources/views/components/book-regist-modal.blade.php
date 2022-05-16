<div class="modal-img">
    <img src="" alt="クリックした図書の画像">
</div>
<div class="modal-title" name="title"></div>
<div class="modal-author" name="author"></div>
<div class="modal-slide">
    <div class="slide-font">
        <div class="slide-text">{{\BookConst::STATUS_READ_NAME}}</div>
        <div class="slide-text">{{\BookConst::STATUS_READWISH_NAME}}</div>
        <div class="slide-text">{{\BookConst::STATUS_UNREAD_NAME}}</div>
    </div>
    <div class="slider">
        <input type="range" name="bookStatus" min="1" max="3" value="2">
    </div>
</div>
<input class="book-id" type="hidden" name="id" value="">
<input class="book-description" type="hidden" name="description" value="">
<div class="book_register-button">
    <button type="submit" class="regist-button">
        本棚に登録
    </button>
</div>
