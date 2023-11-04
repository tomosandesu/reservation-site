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

    <div class="container">

      <form method="post" action="{{ route('reservation.store') }}">
      @csrf


      <div class="row">
        <label for="room_id" class="form-label mt-3">部屋タイプ</label>
        <select name="room_id" class="form-select" aria-label="Disabled select example" value="{{ session('data.plan_id') }}">
          <option selected>部屋タイプ</option>
          @foreach ($rooms as $room)
          <option value="{{ $room->id }}" {{ session('data.room_id') == $room->id ? 'selected' : '' }}>
            {{ $room->room_type }}</option>
          @endforeach
        </select>
      </div>
      <div class="row">
        <label for="plan_id" class="form-label mt-3">宿泊プラン名</label>
        <select name="plan_id" class="form-select" aria-label="Disabled select example" value="{{ session('data.plan_id') }}">
          <option selected>宿泊プラン名</option>
          @foreach($plans as $plan)
          <option value="{{ $plan->id }}" {{ session('data.plan_id') == $plan->id ? 'selected' : '' }}>{{ $plan->title }}</option>
          @endforeach
        </select>
      </div>
      <label for="date" class="form-label mt-3">宿泊日</label>
          <div class="col">
            <input type="date" class="form-control" placeholder="苗字" aria-label="date" name="date" id="date" value="{{ session('data.date') }}">
          </div>
      

      <label for="name" class="form-label mt-3">名前</label>
      <div class="row">
          <div class="col">
            <input type="text" class="form-control" placeholder="苗字" aria-label="last name" name="last_name" id="name" value="{{ session('data.last-name') }}">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="名前" aria-label="first name" name="first_name" id="name" value="{{ session('data.first-name') }}">
          </div>
      </div>
      <form class="row g-3">
          <div class="col-12">
            <label for="inputEmail4" class="form-label mt-3">メールアドレス</label>
            <input type="email" class="form-control" id="inputEmail4" name="email" value="{{ session('data.email') }}">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label mt-3">住所</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="東京都北区" name="address" value="{{ session('data.address') }}">
          </div>
          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label mt-3">電話番号</label>
              <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="ハイフンなしでご入力ください" name="phone" value="{{ session('data.phone') }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label mt-3">メッセージ</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message">{{ session('data.message') }}</textarea>
            </div>

          <button class="btn btn-primary" href="#" role="submit">確認画面へ</button>
      </form>
    </div>







</body>
</html>