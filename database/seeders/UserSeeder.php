<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name="administrador";
        $user->email="leomatos25@gmail.com";
        $user->password=Hash::make("123");
        $user->phone= '18997094034';
        $user->status=1;
        $user->CPF="12345678909";
        $user->save();
    }
}
