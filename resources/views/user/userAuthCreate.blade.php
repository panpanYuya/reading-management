<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
        <div>
            <div class="main">
                <div class="container">
                    <div class="regist-form">
                        @if ($errors)
                            <form action="{{ url('/user/userAuth/create')}}" method="POST">>
                                {{csrf_field()}}
                                @error('username')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    <label for="">
                                        ユーザー名
                                        <input type="text" id="username" name="username" minlength="8" maxlength="20" required value="{{ old('username') }}">
                                    </label>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">
                                    パスワード
                                    <input type="text" id="password" name="password" minlength="8" maxlength="50" required value="{{ old('password') }}">
                                </label>
                                @error('password_confirm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">
                                    パスワード確認用
                                    <input type="text" id="password_confirm" name="password_confirm" minlength="8" maxlength="50" required value="{{ old('password_confirm') }}">
                                </label>
                                @error('mailAddress')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <label for="">
                                    メールアドレス
                                    <input type="mailAddress" id="mailAddress" name="mailAddress" minlength="5" maxlength="50" required value="{{ old('mailAddress') }}">
                                </label>
                                <button type="submit">登録</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
