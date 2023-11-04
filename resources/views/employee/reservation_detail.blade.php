<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>予約詳細ページ</title>
</head>
<body>
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">アカウント画面</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}">ダッシュボード</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reservation.index') }}">戻る</a>
          </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf

            </form>
        </li>
      </ul>
    <div class="container">
        <form action="{{ route('reservation.destroy', $reservation) }}" method="post">
        @csrf
        @method('delete')
        <ul class="list-group">
            <li class="list-group-item"><strong>予約詳細情報</strong></li>
            <li class="list-group-item">部屋名：{{ $reservation->room->room_type }}</li>
            <li class="list-group-item">プラン名{{ $reservation->plan->title }}</li>
            <li class="list-group-item">宿泊日：{{ $reservation->date }}</li>
            <li class="list-group-item">名前：{{ $reservation->last_name }}{{ $reservation->first_name }}</li>
            <li class="list-group-item">メールアドレス：{{ $reservation->email }}</li>
            <li class="list-group-item">住所：{{ $reservation->address }}</li>
            <li class="list-group-item">電話番号：{{ $reservation->phone }}</li>
            <li class="list-group-item">メッセージ：{{ $reservation->message }}</li>
            <li class="list-group-item">予約受信時間：{{ $reservation->created_at }}</li>
        </ul>
            <button type="submit" class="btn btn-danger" class="form-control" >削除</button>
        </form>
        @foreach ($reservation->memos as $memo)
        <li class="list-group-item">従業員用メモ：{{ $memo->memo }}</li>
        @endforeach
        <a href="{{ route('memo.create', $reservation) }}" class="btn btn-primary">従業員用メモ新規作成</a>




    </div>
</body>
</html>