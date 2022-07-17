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
                    <h1 class="title">パスワード変更</h1>
                    <div class="common-form">
                        <form action="{{ url('/password/update')}}" method="POST">
                            @csrf
                            <div class="user-info">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="tag">
                                    <label for="password">パスワード</label><span class="required">必須</span>
                                </div>
                                <input type="password" id="password" name="password" minlength="8" maxlength="50" required >
                                <p class="length_limit">※半角英数字5~50文字以内</p>
                            </div>
                            <div class="user-info">
                                <div class="tag">
                                    <label for="password_confirmation">パスワード確認用</label><span class="required">必須</span>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="50" required>
                            </div>
                            <input type="hidden" name="userId" value={{$userId}}>
                            <div class="user-info">
                                <button type="submit" class="common-button">パスワード変更</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
