<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/common/common-complete.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">変更完了</h1>
                    <div class="regist-container">
                        <div class="complete">パスワードの変更が完了いたしました。</div>
                        <div class="back_button">
                            <a href={{ url('/')}}>ログイン画面へ</a></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
