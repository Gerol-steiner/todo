<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
    <div class="header__inner">
        <a class="header__logo" href="/">
            Todo
        </a>
            <nav>
<!--ページ内のナビゲーション部分を明示的に示すため、SEOやアクセシビリティの向上に役立つ
ヘッダーやサイドバーなど、ユーザーがサイト内を移動するためのリンク集を配置する部分。-->
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/categories">カテゴリ一覧</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>