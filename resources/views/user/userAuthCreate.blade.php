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
                        <form action="{{ url('/user/userAuth/createConfirm')}}" method="POST">
                            @csrf
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
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" required >
                            </label>
                            @error('passwordConfirm')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">
                                パスワード確認用
                                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="50" required>
                            </label>
                            @error('mailAddress')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">
                                メールアドレス
                                <input type="mailAddress" id="mailAddress" name="mailAddress" maxlength="100"  value="{{ old('mailAddress') }}">
                            </label>
                            <button type="submit">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
