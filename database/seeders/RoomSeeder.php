<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('rooms')->insert([
            [
                'name' => 'phòng 404',
                'price'=>50000000,
                'status' => '1',
                'description' => 'bua che',
                'category_id' => 1,
                'image' => 'sadadfsaf',
            ],
        ]);
    }
}
