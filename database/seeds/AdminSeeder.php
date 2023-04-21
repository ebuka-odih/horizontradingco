<?php

use App\User;
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
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'status' => 1,
                'username' =>'admin',
                'admin' => 1,
                'email' => 'admin@horizontradingco.com',
                'email_verified_at' => \Carbon\Carbon::now(),
                'password' => Hash::make('HoriZONtr112'),
            ]);
        }
    }

}
