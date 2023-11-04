<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>日付選択</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'ja',
                height: 'auto',
                firstDay: 1,
                headerToolbar: {
                    left: "dayGridMonth,listMonth",
                    center: "title",
                    right: "today prev,next"
                },
                buttonText: {
                    today: '今月',
                    month: '月',
                    list: 'リスト'
                },
                noEventsContent: 'スケジュールはありません',
                // カレンダーに表示するイベントのデータソースを定義
                eventSources: [ 
                {
                    // ullCalendarはこのURLにGETリクエストを行い、イベントデータをJSON形式で取得
                    url: '/get_events',
                },
            ],
            // eventSourcesで定義されたデータソースからイベントの取得に失敗したときに実行される関数
            eventSourceFailure () { 
                console.error('エラーが発生しました。');
            },
            // イベントの上にマウスカーソルが入ったときに実行される関数
            // イベントにマウスカーソルを合わせると、Bootstrapのpopoverが表示
            eventMouseEnter (info) { 
                $(info.el).popover({
                    title: info.event.title,
                    // popoverのコンテンツとして、イベントのextendedProps.descriptionが表示
                    content: info.event.extendedProps.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body',
                    // これにより、<strong>タグが正しく解釈され、テキストが太字で表示できる
                    html: true
                });
            }
        });
        calendar.render();
    });
</script>
  </head>
  <body>
    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <h3 class="nav-link disabled mx-3">お客様情報入力フォーム</h3>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="card my-3 mx-4" style="width: 30rem;">
                <div class="card-body my-3">
                    <h5 class="card-title">{{ $rooms->room_type }}</h5>
                    <p class="card-text">{{ $rooms->description }}</p>
                </div>
            </div>
            <div class="card my-3" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $plans->title }}</h5>
                    <p class="card-text">{{ $plans->body }}</p>
                </div>
            </div>
        </div>
        {{-- カレンダー表示 --}}
        <div class="my-3" id='calendar'></div>
    </div>
  </body>
</html> 

