<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Room::create([
            'room_type' =>'露天風呂付き和室',
            'total_rooms' => 5,
            'description'=>'伝統的な日本の美しさを感じることができる和室。全室、専用の露天風呂がついており、四季折々の自然を身近に感じながらのんびりと温泉を楽しむことができます。畳の香りと共に、日本のリラックスした時間をご堪能ください。',
        ]);
        \App\Models\Room::create([
            'room_type' =>'露天風呂付き洋室',
            'total_rooms' => 10,
            'description'=>'洗練されたモダンなデザインの洋室で、ゆったりとした空間を提供。部屋に付随する露天風呂からは、星空や都市の景色を一望することができます。国際的な快適さと日本の風呂文化を組み合わせた贅沢な時間をお過ごしいただけます。',
        ]);
    
        \App\Models\Room::create([
            'room_type' =>'高層階スイートルーム',
            'total_rooms' => 7,
            'description'=>'当ホテルの最上階に位置するスイートルーム。窓からは絶景のパノラマが広がり、都市の喧騒を忘れさせる静けさとプライバシーをお約束します。室内は高級感あふれるインテリアで仕上げられ、特別なひとときを演出いたします。',
        ]);
    }
}
