<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nguyen Danh Bao Thang',
                'address' => 'Dong Ha',
                'phone' => '123456789',
                'email' => 'thang@gmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Nguyen Thi Thao Tam',
                'address' => 'Dong Ha',
                'phone' => '123456789',
                'email' => 'tam@gmail.com',
                'password' => Hash::make('123456783')
            ],
            [
                'name' => 'Trịnh Phong Tâm',
                'address' => 'Trung son',
                'phone' => '123456789',
                'email' => 'tam1@gmail.com',
                'password' => Hash::make('123456781')
            ],
            [
                'name' => 'Nguyễn Hữu Nhân',
                'address' => 'Gio Phong',
                'phone' => '123456789',
                'email' => 'nhan@gmail.com',
                'password' => Hash::make('123456782')
            ]
        ]);

    }
}
