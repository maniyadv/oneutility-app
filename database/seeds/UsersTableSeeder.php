<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@oneutility.com',
            'password' => '$2y$10$WF29ALTx16hBTcuIeA6jFupo.5pPo6lgv7cjdJhX777OsIpJI8jvy'
        ]);
    }
}
