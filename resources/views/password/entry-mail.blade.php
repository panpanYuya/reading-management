<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/common/common-form.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">パスワード変更</h1>
                    <div class="common-form">
                        <form action="{{ url('/password/send')}}" method="POST">
                            @csrf
                            <div class="user-info">
                                @error('mailAddress')
                                    <div class="alert alert-danger">{!! $message !!}</div>
                                @enderror
                                <div class="tag">
                                    <label for="mailAddress">メールアドレス</label>
                                </div>
                                <input type="mailAddress" id="mailAddress" name="mailAddress" maxlength="100"  value="{{ old('mailAddress') }}">
                            </div>
                            <div class="user-info">
                                <button type="submit" class="common-button">
                                    認証メール送信
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
