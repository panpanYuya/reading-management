<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>読書管理ツール</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/bookDetail.css') }}" type="text/css">
    </head>
    <body>
        <x-header />
        <div>
            <div class="main">
                <div class="container">
                    <div class="details-container">
                        <div class="details-left">
                            <div class="image"><img src={{ asset('images/title.jpg')}}  alt="本の表紙"></div>
                            <div class="tags-list">
                                <div class="tag">
                                    <div class="circle_first"></div>
                                    <p class="tags_title">SF</p>
                                </div>
                                <div class="tag">
                                    <div class="circle_first"></div>
                                    <p class="tags_title">推理小説</p>
                                </div>
                                <div class="tag">
                                    <div class="circle_first"></div>
                                    <p class="tags_title">料理系</p>
                                </div>
                                <div class="tag">
                                    <div class="circle_first"></div>
                                    <p class="tags_title">資格系</p>
                                </div>
                                <div class="tag">
                                    <div class="circle_first"></div>
                                    <p class="tags_title">ビジネス</p>
                                </div>
                            </div>
                        </div>
                        <div class="details-right">
                            <div class="book-title">本タイトル</div>
                            <div class="book-author">著者著者著者著者</div>
                            <div class="book-page">1690ページ</div>
                            <div class="synopsis_book">この本はこのような中身になっております。中身はこのようになっています</div>
                        </div>
                    </div>
                    <div class="sticky_note-container">
                        <div class="sticky_note-content">
                            <div class="sticky_note">
                                <div class="sticky_top">
                                    <div class="sticky_title">タイトル</div>
                                    <div class="sticky-edit_button"><img src={{asset("images/edit.png")}} alt="編集ボタン"></div>
                                </div>
                                <div class="sticky_bottom">
                                    <div class="sticky_content">P42 の世界はメタバースに包まれていく →つまり今後は何もかもVRでのやり取りが行われていく 子かそんなことをしたら、孤独死や孤独を感じることが多くあふれてしまうのではなかと思われる。 しかしメタバースによって生活様式の一部が拡張現実に行く可能性はありそうだ。。</div>
                                </div>
                            </div>
                            <div class="sticky_note">
                                <div class="sticky_top">
                                    <div class="sticky_title">タイトル</div>
                                    <div class="sticky-edit_button"><img src={{asset("images/edit.png")}} alt="編集ボタン"></div>
                                </div>
                                <div class="sticky_bottom">
                                    <div class="sticky_content">付箋のテキストです。</div>
                                </div>
                            </div>
                            <div class="sticky_note">
                                <div class="sticky_top">
                                    <div class="sticky_title">タイトル</div>
                                    <div class="sticky-edit_button"><img src={{asset("images/edit.png")}} alt="編集ボタン"></div>
                                </div>
                                <div class="sticky_bottom">
                                    <div class="sticky_content">付箋のテキストです。</div>
                                </div>
                            </div>
                        </div>
                        <div class="sticky_add-button">
                            <img src={{asset("images/add.png")}} alt="追加ボタン">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
