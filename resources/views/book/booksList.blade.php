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
                    <div class="books-list">
                        <div class="book">
                            <div class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample1.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
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
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample2.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                        <div class="circle_first"></div>
                                        <div class="circle_second"></div>
                                        <div class="circle_third"></div>
                                        <div class="circle_fource"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample3.png')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                        <div class="circle_first"></div>
                                        <div class="circle_second"></div>
                                        <div class="circle_third"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample4.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                        <div class="circle_first"></div>
                                        <div class="circle_second"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample5.png')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                        <div class="circle_first"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="book">
                            <div iv class="unread">
                               <img src={{ asset('images/未達.png')}} alt="本の画像">
                            </div>
                            <div class="image"><img src={{ asset('images/sample6.jpg')}} alt="本の画像"></div>
                            <div class="book_exaplain">
                                <div class="title">本のタイトル</div>
                                <div class="tags">
                                    <p class="tags_title">見返しタグ</p>
                                    <div class="tags_circle">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
