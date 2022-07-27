<?php

namespace Database\Seeders;

use App\Models\GameLevel;
use Illuminate\Database\Seeder;

class GameLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game_level = [
            [
                'level_name' => 'ROOKIE LEVEL',
                'amount' => 114,
                'membership_fee' => 50,
                'eight_prize_pool' => 50,
                'level_prize_pool' => 10,
                'credit_card_processing_fee' => 4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'level_name' => 'VETERAN LEVEL',
                'amount' => 214,
                'membership_fee' => 50,
                'eight_prize_pool' => 100,
                'level_prize_pool' => 56,
                'credit_card_processing_fee' => 8,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'level_name' => 'HALL OF FAMER LEVEL',
                'amount' => 444,
                'membership_fee' => 50,
                'eight_prize_pool' => 250,
                'level_prize_pool' => 126,
                'credit_card_processing_fee' => 18,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach($game_level as $key => $item){
            GameLevel::create([
                'level_name' => $item['level_name'],
                'amount' => $item['amount'],
                'membership_fee' => $item['membership_fee'],
                'eight_prize_pool' => $item['eight_prize_pool'],
                'level_prize_pool' => $item['level_prize_pool'],
                'credit_card_processing_fee' => $item['credit_card_processing_fee'],
                'created_at' => $item['created_at'],
                'updated_at' => $item['updated_at'],
            ]);
        }
    }
}
