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
    <title>お客様情報入力フォーム</title>
</head>
<body>

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <h3 class="nav-link disabled mx-3">お客様情報入力フォーム</h3>
        </li>
    </ul>

    <div class="container mt-5">
        <h2>お客様情報確認画面</h2>
    
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">入力情報</h5>
                <p><strong>部屋名：</strong> {{ session(('data.room_name')) }}</p>
                <p><strong>プラン名：</strong>{{ session('data.plan_name') }} </p>
                <p><strong>宿泊日：</strong> {{ session('data.date') }}</p>
                <p><strong>苗字：</strong> {{ session('data.last_name') }}</p>
                <p><strong>名前：</strong> {{ session('data.first_name') }}</p>
                <p><strong>メールアドレス：</strong> {{ session('data.email') }}</p>
                <p><strong>住所：</strong> {{ session('data.address') }}</p>
                <p><strong>電話番号：</strong> {{ session('data.phone') }}</p>
                <p><strong>メッセージ：</strong> {{ session('data.message') }}</p>

                <p><strong>合計金額：</strong>{{ session('data.total_price') }}円 </p>
            </div>
        </div>
    
        <div class="mt-4">
            <a href="{{ route('reservation.edit') }}" class="btn btn-warning">修正</a>
            <form action="{{ route('reservation.complete') }}" method="post" style="display: inline;">
                @csrf
                @method('post')
                <button type="submit" class="btn btn-primary">予約確定</button>
            </form>
        </div>
    
    </div>
    
    </body>
    </html>
    
    
    
    
    











</body>
</html>