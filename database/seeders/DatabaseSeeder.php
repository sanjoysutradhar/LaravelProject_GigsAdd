<?php

namespace Database\Seeders;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        Listing::create([
            'title'=>'laravel developer',
            'tag'=> 'laravel, javascripts',
            'company'=> 'acme corp',
            'location'=>'boaton, ma',
            'email'=>'email1@mail.com',
            'website' => "https://www.acme.com",
            'description'=>'I am laravel debveloper'
        ]);
        Listing::create([
            'title'=>'full-stack developer',
            'tag'=> 'laravel, javascripts',
            'company'=> 'acme corp',
            'location'=>'boaton, ma',
            'email'=>'email1@mail.com',
            'website' => "https://www.acme.com",
            'description'=>'I am laravel debveloper'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
