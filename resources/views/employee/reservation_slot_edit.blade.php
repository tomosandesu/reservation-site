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
          <a class="nav-link" href="{{ route('reservation_slot.index', $reservation_slot) }}">戻る</a>
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
        <form action="{{ route('reservation_slot.update', $reservation_slot) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3 mt-4">
                <label for="exampleFormControlInput1" class="form-label">日付</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="date" value="{{ old('date', $reservation_slot->date) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">利用可能部屋数</label>
                <input type="number" class="form-control" id="exampleFormControlInput2" name="available_count" value="{{ old('available_count', $reservation_slot->available_count) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">金額</label>
                <input type="number" class="form-control" id="exampleFormControlInput3" name="price" value="{{ old('price', $reservation_slot->price) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput4" class="form-label">部屋タイプ</label>
                <input type="text" class="form-control" id="exampleFormControlInput4" name="room_type" value="{{ old('room_type', $reservation_slot->room->room_type) }}">
            </div>
        
            <button type="submit" class="btn btn-primary">更新</button>
        </form>
    </div>

    </body>
    </html>