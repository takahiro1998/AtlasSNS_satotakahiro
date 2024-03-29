<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="{{ asset('images/atlas.png') }}"></a></h1>
            <div class="nav-open">
                <p>{{ Auth::user()->username }}　さん</p>
                <nav>
                   <a href="" class="menu-btn"></a>
                   <ul class="tag">
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile/{{ Auth::user()->id }}">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                   </ul>
                </nav>
                <div class="icon">
                    @if(Auth::user()->images=="icon1.png")
                    <img src="{{ asset('images/icon1.png') }}" alt="">
                    @else
                    <img src="{{ asset('storage/images/'.Auth::user()->images) }}">
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="count">
                    <p>フォロー数</p>
                    <p>{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <button class="follow-btn"><a href="/follow-list">フォローリスト</a></button>
                <div class="count">
                    <p>フォロワー数</p>
                    <p>{{ Auth::user()->followUsers()->count() }}名</p>
                </div>
                <button class="follow-btn"><a href="/follower-list">フォロワーリスト</a></button>
            </div>
            <p class="search-btn">
                <a href="/search">ユーザー検索</a>
            </p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/app.js') }} "></script>
    <script src="{{ asset('js/script.js') }} "></script>
</body>
</html>
