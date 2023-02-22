<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\User;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(100)->create()
            ->each(function($user) {
            Movie::create([
                'user_id' => $user->id,
                'title' => fake()->text($maxNbChars = 50),
                'description' => fake()->paragraph()
            ]);

        });
        foreach ((range(1, 100)) as $index) {
            DB::table('likes')->insert(
                [
                    'userable_type'=>'App\Models\User',
                    'userable_id' => rand(1, 100),
                    'likeable_id' => rand(1, 100),
                    'likeable_type' => 'App\Models\Movie',
                    'is_like'=>rand(0, 1),
                ]
            );
    
        }
    }
}
