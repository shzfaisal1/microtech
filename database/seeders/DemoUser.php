<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class DemoUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::Create([

         'name'  => "admin" ,
         'email'  => "admin@gmail.com",
         'password'  => Hash::make('admin')
         
      ]);
    }
}
