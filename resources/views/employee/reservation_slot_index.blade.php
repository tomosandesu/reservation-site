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

    <title>管理画面</title>
</head>
<body>
    <ul class="nav justify-content-end my-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">アカウント画面</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact.index') }}">お問い合わせ一覧</a>
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
        <!-- Search form -->
        <div class="border">
          
          予約枠作成：<a href="{{ route('reservation_slot.create') }}">新規作成</a>

        </div>
        <form method="GET" action="{{ route('reservation_slot.index') }}">
            <div class="form-group">
                <label for="room_type">部屋タイプ</label>
                <select class="form-control" name="room_type" id="room_type">
                    <option value="">すべて</option>
                    <option value="露天風呂付き和室">露天風呂付き和室</option>
                    <option value="露天風呂付き洋室">露天風呂付き洋室</option>
                    <option value="高層階スイートルーム">高層階スイートルーム</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>
      <table class="table table-bordered mt-4">
          <thead>
              <tr>
                  <th>日付</th>
                  <th>利用可能部屋数</th>
                  <th>金額</th>
                  <th>部屋タイプ</th>
                  <th>編集・削除</th>
              </tr>
          </thead>
          <tbody>
              @foreach($reservation_slots as $reservation_slot)
              <tr>
                  <td>{{ $reservation_slot->date }}</td>
                  <td>{{ $reservation_slot->available_count }}</td>
                  <td>{{ $reservation_slot->price }}</td>
                  <td>
                    {{ $reservation_slot->room->room_type }}
                  </td>  <!-- roomリレーションからroom_typeを取得 -->
                  <td> 
                    <div class="row">
                      <a class="btn btn-primary offset-2 mr-1" href="{{ route('reservation_slot.edit', $reservation_slot) }}">編集</a>
                      <form action="{{ route('reservation_slot.destroy', $reservation_slot) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">削除</button>
                    </div>
                  </form>
                  </td>
              </tr>
              
              @endforeach
          </tbody>
      </table>

    

</body>
</html>