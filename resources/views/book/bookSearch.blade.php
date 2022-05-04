<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/bookSearch.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('js/app.js') }}" type="text/javascript">
        <script src="{{ asset('/js/bookSearch.js') }}"></script>
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="search-container">
                        <form action="/book/search" method="post" >
                            <div class="search">
                                @csrf
                                {{-- <img  class="search-icon" src={{ asset('images/search.png')}} alt="search-icon"> --}}
                                @if (isset($keyword))
                                    <input type="text" id="search-keyword" name="keyword" class="search-input" placeholder="検索ワードを入力してください。" required value="{{ $keyword }}">
                                @else
                                    <input type="text" id="search-keyword" name="keyword" class="search-input" placeholder="検索ワードを入力してください。" required value="{{ old('keyword') }}">
                                @endif
                                <button type="submit"></button>
                            </div>
                        </form>
                    </div>
                    <div class="result-container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($resultBooks))
                            @foreach ($resultBooks as $resultBook)
                                <div class="result-book">
                                    <div class="result-top">
                                        <div class="book-image">
                                            @if (isset($resultBook->book_cover_url))
                                            <img src={{ $resultBook->book_cover_url }} alt="本のタイトル">
                                            @else
                                            <img src="{{ asset('images/noImage.png') }}" alt="画像が見つかりませんでした。">
                                            @endif

                                        </div>
                                    </div>
                                    <div class="result-bottom">
                                        <div class="book-title">
                                            {{ $resultBook->title }}
                                        </div>
                                        <div class="book-author">
                                            {{ $resultBook->author }}
                                        </div>
                                        <div class="arrow-right">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $resultBook->api_id }}">
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
