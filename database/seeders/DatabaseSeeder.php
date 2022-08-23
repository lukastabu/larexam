<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'title' => 'Arabia',
            'code' => 'Vilnius1',
            'address' => 'Jogailos g. 3',
        ]);
        DB::table('restaurants')->insert([
            'title' => 'BonBon',
            'code' => 'Vilnius2',
            'address' => 'Kauno g. 3',
        ]);
        
        DB::table('groups')->insert([
            'menu' => 'Dienos',
            'restaurant_id' => '1',
        ]);
        DB::table('groups')->insert([
            'menu' => 'Pusryčių',
            'restaurant_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Pizza',
            'description' => 'Mmm...Italia',
            'photo' => 'https://www.ghanayello.com/img/gh/l/_1429286603-33-eddy-s-pizza.jpg',
            'group_id' => '1',
        ]);
        DB::table('items')->insert([
            'name' => 'Minestrone',
            'description' => 'Si...Italia',
            'photo' => 'https://www.thriftynorthwestmom.com/wp-content/uploads/2015/09/Olive-Garden-Minestrone-Soup-in-Slow-Cooker-150x150.webp',
            'group_id' => '1',
        ]);
        DB::table('items')->insert([
            'name' => 'Omlette',
            'description' => 'Kiaušiniai',
            'photo' => 'https://www.mrbreakfast.com/images/1135.jpg',
            'group_id' => '2',
        ]);
        DB::table('items')->insert([
            'name' => 'Barščiai',
            'description' => 'Burokėliai',
            'photo' => 'https://www.carolinescooking.com/wp-content/uploads/2021/03/borscht-featured-pic-sq-150x150.jpg',
            'group_id' => '2',
        ]);
        
        DB::table('users')->insert([
            'name' => 'admonas',
            'email' => 'admas'.'@gmail.com',
            'password' => Hash::make('admon'),
            'role' => 5,
        ]);
        DB::table('users')->insert([
            'name' => 'bronius',
            'email' => 'bruser'.'@gmail.com',
            'password' => Hash::make('bro'),
        ]);

    }
}
