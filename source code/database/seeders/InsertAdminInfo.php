<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InsertAdminInfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert again
        if( User::where('id', 99)->first() == null ){

            User::create([
                'id' => 99,
                'email' => 'admin@admin.com',
                'tipe_akun' => 2,
                'password' => Hash::make('admin')
            ]);

        }
    }
}
