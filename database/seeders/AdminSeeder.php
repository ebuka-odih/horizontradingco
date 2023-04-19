<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', '=', 'admin@horizontradingco.com')->first();
        if($admin === null){
            DB::table('users')->insert([
                'name' => 'Admin',
                'status' => 1,
                'username' =>'admin',
                'admin' => 1,
                'balance' => 500000,
                'profit' => 600000,
                'email' => 'admin@horizontradingco.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('Horizon12345'),
            ]);
        }
    }

}
