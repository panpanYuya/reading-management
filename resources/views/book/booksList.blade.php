<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/booksList.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="slideshow">
                        <ul id="nav">
                            <li><a href="#">名前</a></li>
                            <li><a href="#">読んだ日</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                        </ul>
                    </div>
                    <div class="books-list">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
