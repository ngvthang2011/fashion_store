<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1, 'email'=>'admin@gmail.com', 'password'=> bcrypt('123456'), 'full'=>'ADMIN', 'address'=>'Hà Nội', 'phone'=>'0339054040', 'level'=>1],
            ['id'=>2, 'email'=>'nguyeson@gmail.com', 'password'=>bcrypt('123456'), 'full'=>'Nguyễn Trường Sơn', 'address'=>'Hà Nam', 'phone'=>'0293054040', 'level'=>2],
            ['id'=>3, 'email'=>'nguyenthang@gmail.com', 'password'=>bcrypt('123456'), 'full'=>'Nguyễn Văn Thắng', 'address'=>'Thái Bình', 'phone'=>'0331929292', 'level'=>1],
            ['id'=>4, 'email'=>'tranAn@gmail.com', 'password'=>bcrypt('123456'), 'full'=>'Trần Đình An', 'address'=>'Hà Nội', 'phone'=>'0309528192', 'level'=>2]
        ]);
    }
}
