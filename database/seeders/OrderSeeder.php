<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'total' => 500000,
                'checkin' => '2022-12-25',
                'checkout' => '2022-12-27',
                'price' => 322214,
                'room_id' => 1,
                'customer_id' => 1,
                'created_at'=>'2022-1-27'
            ],
        ]);
    }
}
