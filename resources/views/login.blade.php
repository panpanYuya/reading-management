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
                        <form action="{{ url('/login')}}" method="POST">
                            @csrf
                            @error('userName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">
                                ユーザー名
                                <input type="text" id="userName" name="userName" minlength="8" maxlength="20" required value="{{ old('userName') }}">
                            </label>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <label for="">
                                パスワード
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" required >
                            </label>
                            <button type="submit">ログイン</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
