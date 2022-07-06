<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/book/edit-book.css') }}" type="text/css">
    </head>
    <body>
        <img src={{ asset('images/arrow.png')}} class="return" alt="戻るボタン">
        <x-header />
        <div class="main">
            <div class="container">
                <div class="book">
                    <div class="book-image"><img src={{ asset('images/title.jpg')}}  alt="本の表紙"></div>
                    <div class="book-title">テスト用のタイトル欄</div>
                </div>
                <div class="status">
                    <div class="status-container">
                        <div class="readed-box">
                            <div class="icon"><img class="read-icon" src={{ asset('images/read.png')}} alt="既読"></div>
                            <p class="status-text">読んだ</p>
                        </div>
                        <div class="high_priority-book-box">
                            <div class="icon"><img class="priority-book-icon" src={{ asset('images/want_read.png')}} alt="既読"></div>
                            <p class="status-text">読みたい</p>
                        </div>
                        <div class="unread-box">
                            <div class="icon"><img class="unread-icon" src={{ asset('images/unread.png')}} alt="既読"></div>
                            <p class="status-text">未達</p>
                        </div>
                    </div>
                </div>
                <div class="shelf">
                    <Button class="edit_shelf-button">登録本棚を編集</Button>
                </div>
                <div class="delete">
                    <Button class="delete_book-button">本を削除</Button>
                </div>
            </div>
        </div>
    </body>
</html>
