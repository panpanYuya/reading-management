<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/booksList.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="slideshow">
                        <ul id="nav">
                            <li><a href="#">名前</a></li>
                            <li><a href="#">読んだ日</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                            <li><a href="#">未読</a></li>
                        </ul>
                    </div>
                    @if(isset($userBooks))
                        <div class="books-list">
                            @foreach ( $userBooks as $userBook)
                                <div class="book">
                                    @if($userBook->read_status == \BookConst::STATUS_READWISH_NAME ||  $userBook->read_status == \BookConst::STATUS_UNREAD_NAME)
                                        <div class="unread">
                                            <img src={{ asset('images/未達.png')}} alt="未達">
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
                                    <input type="hidden" name="userBookId" value={{ $userBook->id}}>
                                </div>
                            @endforeach
                        </div>
                    @elseif (!isset($userBooks))
                        <div class="books-list">
                            <div class="error-message">まだ登録がされていません。</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
