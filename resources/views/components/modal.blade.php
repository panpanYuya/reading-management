<link rel="stylesheet" href="{{ asset('css/modal.css') }}" type="text/css">
<div>
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-close"></div>
            <div class="modal-img">
                <img src="" alt="クリックした図書の画像">
            </div>
            <div class="modal-title" name="title"></div>
            <div class="modal-author" name="author"></div>
            <div class="modal-slide">
                <div class="slide-font">
                    <div>読んだ</div>
                    <div>読みたい</div>
                    <div>未読</div>
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
        </div>
    </div>
</div>
