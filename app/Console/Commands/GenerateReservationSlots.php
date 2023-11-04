<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateReservationSlots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-reservation-slots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 今日の日付からスタートして、2ヶ月後までの日付を終了点とする
        $startDate = now();
        $endDate = now()->addMonths(2);

        // 経過日数を計算
        $days = $endDate->diffInDays($startDate);

        // Roomモデルを使って、全ての部屋を取得します（仮定）
        $rooms = Room::all();

        //２ヶ月分を情報登録するで〜
        for ($i = 0; $i <= $days; $i++) {
            $currentDate = $startDate->copy()->addDays($i);

            // 週末のチェック
            $isWeekend = $currentDate->isWeekend();

            // すべての部屋に対して、予約枠を生成します
            foreach ($rooms as $room) {
                // 休日と平日で価格を変える
                $price = $isWeekend ? $room->weekend_price : $room->weekday_price;

                // ここで各日、各部屋の予約枠を生成するロジックを実装
                Reservation_slot::create([
                    'room_id' => $room->id,
                    'date' => $currentDate,
                    'available_count' => 1,  // 1部屋に対しての予約可能数。必要に応じて変更してください
                    'price' => $price,
                ]);
            }
        }

        $this->info('Reservation slots for all rooms generated successfully for the next 2 months!');
    }
}
