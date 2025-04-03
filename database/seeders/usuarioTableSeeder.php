<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'Italo Donoso Barraza',
            'email'=>'italo.donoso@ucn.cl',
            'password'=> bcrypt('Turjoy91'),
            'userType' => 2,
        ]);
    }
}
