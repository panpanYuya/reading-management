<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/user/user-cancell.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">退会</h1>
                    <div class="common-form">
                        <div class="caution-text">
                            <h2>※注意事項</h2>
                            <p>退会時、以下の情報がすべて削除されます。</p>
                            <ul>
                                <li>ユーザー情報</li>
                                <li>登録した本</li>
                                <li>登録した付箋</li>
                            </ul>
                        </div>
                        <form action="{{ url('/user/delete')}}" method="POST">
                            @csrf
                            <div class="delete-content">
                                @error('deleteCheckBox')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="checkbox" id="deleteCheckBox" name="deleteCheckBox">
                                <p class="checkbox-text">注意事項を読んだ上で、退会します。</p>
                            </div>
                            <input type="hidden" name="userId" value={{$userId}}>
                            <div class="delete-content flex-content">
                                <button type="submit" class="common-button" disabled>
                                    退会
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('/js/userDelete.js') }}"></script>
</html>
