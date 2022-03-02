<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
    </head>
    <body class="antialiased">
        <script src="{{ mix('/js/search.js') }}"></script>
        <div>
            <div class="main">
                <div class="container">
                    <div class="search-book-wrapper">
                        <form action="{{ url('/searchBook/search')}}" method="POST">
                            @csrf
                            <input type="text">
                            <button type="submit">探す</button>
                        </form>
                        <div class="search-book-form">
                            <input type="text" id="search-keyword">
                            <button type="button" id="search-book">test</button>
                        </div>
                        <div class="result-list">
                            <img class="book-self" src="" alt="">
                            <p class="title"></p>
                            <p class="author"></p>
                            <input type="hidden" class="book-api-id">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
