<link rel="stylesheet" href="{{ asset('css/sticky-note-modal.css') }}" type="text/css">
<div>
    <div id="modal" class="modal">
        <div class="modal-close">✖</div>
        <div class="modal-box">
            <div class="sticky-note-box">
                <div class="sticky-page">
                    <input type="number" value="" placeholder="ページ数" />
                </div>
                <div class="sticky-title">
                    <input type="text" value="" placeholder="付箋のタイトル" />
                </div>
                <div class="sticky-memo">
                    <textarea name="memo" placeholder="付箋" value=""></textarea>
                </div>
                <div class="sticky-regist-button">
                    <button type="submit" class="regist-button">
                        付箋を登録
                    </button>
                </div>
                <input type="hidden" class="sticky_id" name="sticky_id">
                <input type="hidden" class="user_book_id" name="user_book_id">
            </div>
            <div class="message-box"></div>
        </div>
    </div>
</div>
