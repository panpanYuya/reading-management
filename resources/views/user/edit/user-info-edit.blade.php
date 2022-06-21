<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/commonForm.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">ユーザー情報変更</h1>
                    <div class="common-form">
                        <form action={{ url('/user/update')}} method="POST">
                            @csrf
                            <div class="user-info">
                                @error('user_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="user_name">ユーザー名</label>
                                </div>
                                    <input type="text" id="user_name" name="user_name" minlength="8" maxlength="20" required value={{$userInfo->user_name}}>
                                    <p class="length_limit">※半角英数字8~20文字以内</p>
                                </div>
                            <div class="user-info">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="password">パスワード</label>
                                </div>
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" >
                                <p class="length_limit">※半角英数字8~50文字以内</p>
                            </div>
                            <div class="user-info">
                                @error('passwordConfirm')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="password_confirmation">パスワード確認用</label>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="50">
                            </div>
                            <div class="user-info">
                                @error('mailAddress')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="mailAddress">メールアドレス</label>
                                </div>
                                @if (isset($userInfo->mail_address))
                                    <input type="mailAddress" id="mailAddress" name="mailAddress" maxlength="100"  value={{$userInfo->mail_address}}>
                                @else
                                    <input type="mailAddress" id="mailAddress" name="mailAddress" maxlength="100"  value={{ old('mailAddress') }}>
                                @endif
                            </div>
                            <div class="user-info">
                                <p class="warning_note">※パスワードを忘れてしまった際、メールアドレスがないとパスワードの再設定ができません。</p>
                            </div>
                            <input type="hidden" name="userId" value={{$userInfo->id}}>
                            <div class="user-info">
                                <button type="submit" class="common-button">
                                    変更
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
