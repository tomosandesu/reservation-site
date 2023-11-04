<!DOCTYPE html>
<html lang='ja'>

    <head>
        <meta charset='utf-8' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <title>予約完了画面</title>
    </head>
    <body>

            <ul class="nav nav-tabs my-4">
                <li class="nav-item">
                    <h3 class="nav-link disabled mx-3">空室確認カレンダー</h3>
                </li>
            </ul>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                予約完了
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">ありがとうございます！</h5>
                                <p class="card-text">ホテルの予約が正常に完了しました。</p>
                                
                                <hr>
                                
                                <h6>予約詳細:</h6>
                                <p><strong>部屋名：</strong> {{ session(('data.room_name')) }}</p>
                                <p><strong>プラン名：</strong>{{ session('data.plan_name') }} </p>
                                <p><strong>宿泊日：</strong> {{ session('data.date') }}</p>
                                <p><strong>合計金額： </strong>¥{{ number_format(session('data.total_price')) }}円 </p>
            
                                <hr>
            
                                <p>予約確認メールを送信しましたので、ご確認ください。</p>
            
                                <a href="{{ route('dashboard') }}" class="btn btn-primary">ホームに戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    </html>


