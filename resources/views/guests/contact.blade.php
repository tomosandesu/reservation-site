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
    <title>お問い合わせフォーム</title>
</head>
<body>

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <h3 class="nav-link disabled mx-3">お問い合わせフォーム</h3>
        </li>
    </ul>

    <div class="container">
        <form action="{{ route('contact.store') }}" method="post">
        @csrf
            {{-- お問い合わせフォーム --}}
            <h1 class="text-center mb-4">お問い合わせ</h1>
            <h2 class="text-center">-</h2>
            {{-- メールアドレス --}}
            <div class="row justify-content-around my-4">
                <div class="col-2">
                    <label for="exampleFormControlInput3" class="form-label">メールアドレス</label>
                </div>
                <div class="col-5">
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
                </div>
            </div>
            {{-- お問い合わせ内容 --}}
            <div class="row justify-content-around my-4">
                <div class="col-2">
                    <label for="exampleFormControlInput8" class="form-label">お問い合わせ内容</label>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <textarea class="form-control" name="message"id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary offset-10">送信</button>
        </form>   
    </div>
</body>
</html>