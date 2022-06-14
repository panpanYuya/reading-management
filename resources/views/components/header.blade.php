<link rel="stylesheet" href="{{ asset('css/header.css') }}" type="text/css">
<header class="site-header">
    <div class="header-wrapper">
        @auth
            <div class="hamburger-menu">
                <input type="checkbox" id="menu-btn-check">
                <label for="menu-btn-check" class="menu-btn"><span></span></label>
                <!--ここからメニュー-->
                <div class="menu-content">
                    <ul>
                        <li>
                            <a href="/book/search">図書検索</a>
                        </li>
                        <li>
                            <a href="/book/list">図書一覧</a>
                        </li>
                        <li>
                            <a href="/user/edit">ユーザー情報変更</a>
                        </li>
                        <li>
                            <a href="/logout">ログアウト</a>
                        </li>
                    </ul>
                </div>
                <!--ここまでメニュー-->
            </div>
        @endauth
    </div>
</header>
