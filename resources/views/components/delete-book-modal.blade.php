<link rel="stylesheet" href="{{ asset('css/common/modal.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/book/delete-book-modal.css') }}" type="text/css">
<div>
    <div id="modal" class="modal">
        <div class="modal-close">✖</div>
        <div class="modal-box">
            <div class="delete-book-box">
                <form action="{{ url('/book/detail/{userBookId}/delete')}}" method="POST">
                    @csrf
                    <div class="delete-content">
                        @error('deleteCheckBox')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="checkbox" id="deleteCheckBox" name="deleteCheckBox">
                        <p class="checkbox-text">本を削除してよろしいでしょうか。</p>
                    </div>
                    <input type="hidden" name="userBookId" value={{$userBookId}}>
                    <div class="delete-content flex-content">
                        <button type="submit" class="common-button" disabled>
                            本を削除
                        </button>
                    </div>
                </form>
            </div>
            <div class="message-box"></div>
        </div>
    </div>
</div>
