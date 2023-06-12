<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;


class InsertUsersUnit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    Unit::insert([
		    [
		    	'email' => 'daniela195@gmail.com',
			'tipe_akun' => 0,
			'password' => Hash::make('password'),
		    ],
                    [
                        'email' => 'alditaher016@gmail.com',
			'tipe_akun' => 0,
			'password' => Hash::make('password'),
		    ],
	    ]);
    }
}
