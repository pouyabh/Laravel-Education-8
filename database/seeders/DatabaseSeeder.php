<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'username' => 'Pouyabh',
            'name' => 'Pouya Bh',
            'email' => 'pouyabh1380@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
