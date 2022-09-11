<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>読書管理ツール</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/book/book-detail.css') }}" type="text/css">
</head>

<body>
    <x-header />
    <div class="main">
        <div class="container">
            <x-sticky-note-modal />
            <div class="details-container">
                <div class="book-detail">
                    <div class="details-left">
                        @if (isset($bookDetail->book_cover_url))
                            <div class="book-image"><img src={{ $bookDetail->book_cover_url }} alt="本の表紙"></div>
                        @else
                            <div class="book-image"><img src={{ asset('images/noImage.png') }} alt="本の表紙"></div>
                        @endif
                    </div>
                    <div class="details-right">
                        <div class="book-title">{{ $bookDetail->title }}</div>
                        <div class="book-author">{{ $bookDetail->author }}</div>
                        {{-- <div class="book-page">1690ページ</div> --}}
                        <div class="synopsis_book">{!! $bookDetail->description !!}</div>
                        <input type="hidden" class="user_book_id" name="user_book_id" value={{ $bookDetail->id }}>
                    </div>
                </div>
                <div class="edit-book">
                    <button class="edit-button">図書編集</button>
                </div>
            </div>
            <div class="sticky_note-container">
                <div class="sticky_note-content">
                    @if (isset($stickyNotes))
                        @foreach ($stickyNotes as $stickyNote)
                            <div class="sticky_note">
                                <div class="sticky_top">
                                    @if (isset($stickyNote->page_number))
                                        <div class="book-page">P{{ $stickyNote->page_number }}</div>
                                    @endif
                                    <div class="sticky_title">{{ $stickyNote->sticky_title }}</div>
                                    <div class="sticky-edit_button">
                                        <img src={{ asset('images/edit.png') }} alt="編集ボタン">
                                    </div>
                                    <div class="sticky-trash_button">
                                        <img src={{ asset('images/trash.png') }} alt="削除ボタン">
                                    </div>
                                </div>
                                <div class="sticky_bottom">
                                    <div class="sticky_content">{!! nl2br(e($stickyNote->sticky_memo)) !!}</div>
                                </div>
                                <input type="hidden" class="sticky_id" name="sticky_id" value={{ $stickyNote->id }}>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="sticky_add-button">
                    <img src={{ asset('images/add.png') }} alt="追加ボタン">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('/js/modal.js') }}"></script>
<script src="{{ asset('/js/bookDetail.js') }}"></script>

</html>
