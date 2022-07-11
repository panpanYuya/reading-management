<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/common/common-form.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/shelf/edit-shelf.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <h1 class="title">本棚登録</h1>
                    <div class="common-form">
                        <div class="shelf-info">
                            @error('shelf-name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="tag">
                                <label for="shelf_name">本棚名前1</label>
                            </div>
                            <input type="text" id="shelf_name" name="shelf_name1" maxlength="10" required value="{{ old('shelf_name1') }}">
                            <p class="length_limit">※10文字以内</p>
                        </div>
                        <div class="shelf-info">
                            @error('shelf-name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="tag">
                                <label for="shelf_name">本棚名前2</label>
                            </div>
                            <input type="text" id="shelf_name" name="shelf_name2" maxlength="10" required value="{{ old('shelf_name2') }}">
                            <p class="length_limit">※10文字以内</p>
                        </div>
                        <div class="shelf-info">
                            @error('shelf-name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="tag">
                                <label for="shelf_name">本棚名前3</label>
                            </div>
                            <input type="text" id="shelf_name" name="shelf_name3" maxlength="10" required value="{{ old('shelf_name3') }}">
                            <p class="length_limit">※10文字以内</p>
                        </div>
                        <div class="shelf-info">
                            @error('shelf-name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="tag">
                                <label for="shelf_name">本棚名前4</label>
                            </div>
                            <input type="text" id="shelf_name" name="shelf_name4" maxlength="10" required value="{{ old('shelf_name4') }}">
                            <p class="length_limit">※10文字以内</p>
                        </div>
                        <div class="shelf-info">
                            @error('shelf-name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="tag">
                                <label for="shelf_name">本棚名前5</label>
                            </div>
                            <input type="text" id="shelf_name" name="shelf_name5" maxlength="10" required value="{{ old('shelf_name5') }}">
                            <p class="length_limit">※10文字以内</p>
                        </div>
                        <div class="shelf-info">
                            <button class="add-button">
                                本棚を追加
                            </button>
                        </div>
                        <div class="shelf-info">
                            <button class="update-button">
                                本棚を更新
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
