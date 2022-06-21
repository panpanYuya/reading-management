<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/commonCompletePage.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">認証時間切れ</h1>
                    <div class="regist-container">
                        <div>認証期間を過ぎてしまいました。</div>
                        <div>{{$message}}</div>
                        <div class="back_button">
                            <a href="/user/create/">新規登録画面へ</a></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
