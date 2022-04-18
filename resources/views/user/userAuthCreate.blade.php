<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}" type="text/css">
    </head>
    <body class="antialiased">
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">新規登録</h1>
                    <div class="regist-form">
                        <form action="{{ url('/user/createUser')}}" method="POST">
                            @csrf
                            @error('user_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="user-info">
                                <div class="tag">
                                    <label for="user_name">ユーザー名</label><span class="required">必須</span>
                                </div>
                                    <input type="text" id="user_name" name="user_name" minlength="8" maxlength="20" required value="{{ old('user_name') }}">
                                    <p class="length_limit">8文字以上20文字以内で入力してください。</p>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="user-info">
                                <div class="tag">
                                    <label for="password">パスワード</label><span class="required">必須</span>
                                </div>
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" required >
                                <p class="length_limit">5文字以上50文字以内で入力してください。</p>
                                @error('passwordConfirm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="user-info">
                                <div class="tag">
                                    <label for="password_confirmation">パスワード確認用</label><span class="required">必須</span>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="50" required>
                                @error('mailAddress')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="user-info">
                                <div class="tag">
                                    <label for="mailAddress">メールアドレス</label>
                                </div>
                                <input type="mailAddress" id="mailAddress" name="mailAddress" maxlength="100"  value="{{ old('mailAddress') }}">
                            </div>
                            <div class="user-info">
                                <p class="warning_note">※パスワードを忘れてしまった際、メールアドレスがないとパスワードの再設定ができません。</p>
                            </div>
                            <div class="user-info">
                                <button type="submit" class="register-button">
                                    登録
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
