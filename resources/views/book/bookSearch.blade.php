<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/bookSearch.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('js/app.js') }}" type="text/javascript">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="search-container">
                        <div class="search">
                            {{-- <img  class="search-icon" src={{ asset('images/search.png')}} alt="search-icon"> --}}
                            <input type="text" class="search-input" placeholder="検索ワードを入力してください。">
                        </div>
                    </div>
                    <div class="result-container">
                        <div class="result-book">
                            <div class="result-top">
                                <div class="book-image">
                                    <img src={{ asset('images/title.jpg')}} alt="本のタイトル">
                                </div>
                            </div>
                            <div class="result-bottom">
                                <div class="book-title">
                                    本のタイトル
                                </div>
                                <div class="book-author">
                                    本の著者
                                </div>
                                <div class="arrow-right">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
