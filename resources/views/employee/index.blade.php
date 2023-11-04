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
    <title>予約一覧</title>
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
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
    <div class="container">
        <form method="GET" action="{{ route('reservation.index') }}">
            <div class="form-group">
                <label for="date" class="form-label">宿泊日</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>
        <h1>予約一覧</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>部屋タイプ</th>
                    <th>宿泊プラン</th>
                    <th>金額</th>
                    <th>宿泊日</th>
                    <th>苗字</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>住所</th>
                    <th>電話番号</th>
                    <th>メッセージ</th>
                    <th>予約受信時間</th>
                    <th>ステータス</th>
                    <th>詳細画面<th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->room->room_type }}</td>
                        <td>{{ $reservation->plan->title }}</td>
                        <td>{{ $reservation->total_price }}</td>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->last_name }}</td>
                        <td>{{ $reservation->first_name }}</td>
                        <td>{{ $reservation->email }}</td>
                        <td>{{ $reservation->address }}</td>
                        <td>{{ $reservation->phone }}</td>
                        <td>{{ $reservation->message }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>
                            <form method="POST" action="{{ route('reservation.updateStatus', $reservation)}}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-{{ $reservation->status === 0 ? 'warning' : 'danger' }}">
                                {{ $reservation->status === 1 ? '予約済み':'キャンセル' }}</button>
                            </form>
                        </td>
                        <td>
                        <a href="{{ route('reservation.detail', $reservation) }}" class="btn btn-success">詳細</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    </div>
</body>
</html>