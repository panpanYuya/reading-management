<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/common/common-form.css') }}" type="text/css">
    </head>

    <body class="antialiased">
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">ログイン</h1>
                    <div class="common-form">
                        <form action="{{ url('/login/auth')}}" method="POST">
                            @csrf
                            <div class="user-info">
                                @error('user_name')
                                    <div class="alert alert-danger">{!! $message !!}</div>
                                @enderror
                                <div class="tag">
                                    <label for="user_name">
                                        ユーザーネーム
                                    </label>
                                </div>
                                <input type="text" id="user_name" name="user_name" minlength="8" maxlength="20" required value="{{ old('userName') }}">
                            </div>
                            <div class="user-info">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="password">
                                        パスワード
                                    </label>
                                </div>
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" required >
                                <a href="/password/forget" class="forget-password">パスワードを忘れた方はこちら</a>
                            </div>
                            <div class="user-info">
                                <button type="submit" class="common-button">ログイン</button>
                            </div>
                        </form>
                        <div class="user-info">
                            <button class="regist-button">新規登録</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ mix('/js/login.js') }}"></script>
</html>
