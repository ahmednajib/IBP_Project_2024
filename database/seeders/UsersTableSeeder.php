<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password=Hash::make('12345');
        $userRecords = [
            [   'id'=>1,
                'first_name'=>'ahmed ',
                'last_name'=>'najib',
                'username'=>'ahmed',
                'password'=>$password,
                'birth_date'=>'2001-01-04',
                'permission'=>true,
                'image'=>'https://avatars.githubusercontent.com/u/140763456?s=400&u=a5cdd691377bf96ccedd0b1d7744989b68617e39&v=4'
            ],
            [   'id'=>2,
                'first_name'=>'mohannad',
                'last_name'=>'alhajj',
                'username'=>'mohannad',
                'password'=>$password,
                'birth_date'=>'2003-07-18',
                'permission'=>false,
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWwb7VqZWWn6W92xv34aLhCXSrVGeArGHPhSKh4PysLQ&s'
            ],
            [   'id'=>3,
                'first_name'=>'hosam',
                'last_name'=>'alfawdai',
                'username'=>'hosam',
                'password'=>$password,
                'birth_date'=>'2000-05-10',
                'permission'=>false,
                'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWwb7VqZWWn6W92xv34aLhCXSrVGeArGHPhSKh4PysLQ&s'
            ],
        ];
        User::insert($userRecords);
    }
}
