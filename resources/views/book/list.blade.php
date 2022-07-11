<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/book/books-list.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="slideshow">
                        <ul id="nav">
                            <li class="regist_date"><a href="{{route('list', ['statusId'=>\BookConst::DEAFALUT_BOOK_STATUS])}}">登録日順</a></li>
                            <li class="read_status"><a href="{{route('list', ['statusId'=>\BookConst::READ_STATUS])}}">読んだ本のみ</a></li>
                            <li class="read-wish_status"><a href="{{route('list', ['statusId'=>\BookConst::READWISH_STATUS])}}">読みたい本のみ</a></li>
                            <li class="unread_status"><a href="{{route('list', ['statusId'=>\BookConst::UNREAD_STATUS])}}">未読のみ</a></li>
                        </ul>
                    </div>
                    @if(!$userBooks->isEmpty())
                        <div class="books-list">
                            @foreach ( $userBooks as $userBook)
                                <div class="book">
                                    @if($userBook->read_status == \BookConst::READWISH_STATUS ||  $userBook->read_status == \BookConst::UNREAD_STATUS)
                                        <div class="unread">
                                            <img src="{{ asset('images/unread.png')}}" alt="未達">
                                        </div>
                                    @endif
                                    <div class="image"><img src={{ $userBook->book_cover_url}} alt="本の画像"></div>
                                    <div class="book_exaplain">
                                        <div class="title">{{$userBook->title}}</div>
                                        <div class="tags">
                                            <p class="tags_title">見返しタグ</p>
                                            <div class="tags_circle">
                                                <div class="circle_first"></div>
                                                <div class="circle_second"></div>
                                                <div class="circle_third"></div>
                                                <div class="circle_fource"></div>
                                                <div class="circle_fifth"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="userBookId" name="userBookId" value={{ $userBook->id }}>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="books-list">
                            <div class="error-message">まだ登録がされていません。</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('/js/bookList.js') }}"></script>
</html>
