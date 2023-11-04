<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>アクセス案内ページ</title>
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs my-4">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('welcome') }}">TOPページ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">メニュー</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">宿泊プラン一覧</a></li>
                  <li><a class="dropdown-item" href="#">客室紹介</a></li>
                  <li><a class="dropdown-item" href="#">お問い合わせフォーム</a></li>
                </ul>
              </li>
          </ul>

          <h1>アクセス案内ページ</h1>
    </div>
</body>
</html>