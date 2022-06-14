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
                    <h1 class="title">仮登録登録</h1>
                    <div class="regist-container">
                        <div>認証用のメールが送信されました。</div>
                        <div>ご確認ください。</div>
                        <div>認証期間はいまから24時間です。</div>
                        <div class="back_button">
                            <a href="/">ログイン画面へ</a></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
