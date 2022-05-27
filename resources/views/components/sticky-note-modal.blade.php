<link rel="stylesheet" href="{{ asset('css/sticky-note-modal.css') }}" type="text/css">
<div>
    <div id="modal" class="modal">
        <div class="modal-close">✖</div>
        <div class="modal-box">
            <div class="sticky-note-box">
                <x-sticky-regist />
                <x-sticky-delete />
                <input type="hidden" class="sticky_id" name="sticky_id">
                <input type="hidden" class="user_book_id" name="user_book_id">
            </div>
            <div class="message-box"></div>
        </div>
    </div>
</div>
