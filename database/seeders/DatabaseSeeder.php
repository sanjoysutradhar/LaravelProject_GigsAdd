<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
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
        // \App\Models\User::factory(5)->create();
        $user=User::factory()->create([
            'name'=> 'John Doe',
            'email'=>'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id'=>$user->id
        ]);

        // Listing::create([
        //     'title'=>'laravel developer',
        //     'tag'=> 'laravel, javascripts',
        //     'company'=> 'acme corp',
        //     'location'=>'boaton, ma',
        //     'email'=>'email1@mail.com',
        //     'website' => "https://www.acme.com",
        //     'description'=>'I am laravel debveloper'
        // ]);
        // Listing::create([
        //     'title'=>'full-stack developer',
        //     'tag'=> 'laravel, javascripts',
        //     'company'=> 'acme corp',
        //     'location'=>'boaton, ma',
        //     'email'=>'email1@mail.com',
        //     'website' => "https://www.acme.com",
        //     'description'=>'I am laravel debveloper'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
